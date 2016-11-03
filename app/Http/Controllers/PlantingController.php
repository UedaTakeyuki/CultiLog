<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Shelf;
use App\Plant;
use App\Planting;
use App\Unit;

use Excel;

class PlantingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $plantings = Planting::orderBy('planted_at', 'ASC')->get();
        return view('planting.index', compact('plantings'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
        //
        if ($id != null){
            $shelf_id = $id;
            return view('planting.create',compact('shelf_id'));
        } else {
            return view('planting.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $planting = new Planting;
        $planting->planted_at = $request->input('planted_at');
        //echo var_dump($request); exit;        if (is_int($request->input('shelf_id'))){
        $planting->shelf_id = $request->input('shelf_id');
//            $planting->shelf_id = Shelf::where('name', $request->input('shelf_id'))->first()->id;
        $planting->plant_id = Plant::where('name', $request->input('plant_id'))->first()->id;
        $planting->save();
 
        return redirect('shelf/'.$request->input('shelf_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $planting = Planting::findOrFail($id);
        return view('planting.show',compact('planting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $planting = Planting::findOrFail($id);
        $units = Unit::all();
        return view('planting.edit',compact('planting', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $planting = Planting::findOrFail($id);
        //$planting->update($request->all());
        //return redirect(url('planting', [$planting->id]));
        if (!is_null($request->input('planted_at'))){
            $planting->planted_at = $request->input('planted_at');
        }
        if (!is_null($request->input('shelf_id'))){
            $planting->shelf_id = $request->input('shelf_id');
        }
        if (!is_null($request->input('plant_id'))){
            $planting->plant_id = Plant::where('name', $request->input('plant_id'))->first()->id;
        }
        $planting->save();
 
        return redirect('shelf/'.$request->input('shelf_id'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $shelf_id = Planting::findOrFail($id)->shelf_id;
        Planting::destroy($id);
        return redirect('shelf/'.$shelf_id);
    }

    /**
     * Close the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function close($id)
    {
        //
        $planting = Planting::findOrFail($id);
        $planting->closed_at = date('Y-m-d');
        $planting->save();
        return redirect('shelf/'.$planting->shelf_id);
    }
    
    /**
     * Reopen the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reopen($id)
    {
        //
        $planting = Planting::findOrFail($id);
        $planting->closed_at = null;
        $planting->save();
        return redirect('shelf/'.$planting->shelf_id);
    }

    public function excel()
    {
        //
        $plants = Plant::all();

//        $plantings = Planting::all();
        $plantings2 = Planting::join('shelves', 'shelves.id', '=', 'plantings.shelf_id')
            ->join('plants', 'plants.id', '=', 'plantings.plant_id')
            ->select(
                'plantings.id',
                'shelves.name as 棚',
                'plants.name as 品種',
                'plantings.planted_at as 定植日',
                'plantings.closed_at as 撤収日',
                'plantings.created_at',
                'plantings.updated_at',
                'plantings.deleted_at'
                )
            ->get();
        Excel::create('plantings', function($excel) use($plantings2, $plants) {
            $excel->sheet('定植', function($sheet) use($plantings2) {
                $sheet->fromArray($plantings2);
                for ($i = 3; $i <= 250; $i++){
                    $objValidation = $sheet->getCell('C'.$i)->getDataValidation();
                    $objValidation->setType(\PHPExcel_Cell_DataValidation::TYPE_LIST);
                    $objValidation->setErrorStyle(\PHPExcel_Cell_DataValidation::STYLE_INFORMATION);
                    $objValidation->setAllowBlank(false);
                    $objValidation->setShowInputMessage(true);
                    $objValidation->setShowErrorMessage(true);
                    $objValidation->setShowDropDown(true);
                    $objValidation->setErrorTitle('Input error');
                    $objValidation->setError('Value is not in list.');
                    $objValidation->setPromptTitle('Pick from list');
                    $objValidation->setPrompt('Please pick a value from the drop-down list.');
                    //$objValidation->setFormula1('"Item A,Item B,Item C"'); //note this!
                    $objValidation->setFormula1('品種!$B$2:$B$38'); //note this!
                }
                $sheet->insertNewColumnBefore( 'B', 1 );
                $sheet->getCell('B1')->setValue("編集");
            });
            $excel->sheet('品種', function($sheet) use($plants) {
                $sheet->fromArray($plants);
            });
//        })->export('xls');
        })->download('xls');
    }
    
}
