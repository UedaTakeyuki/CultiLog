<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Shelf;
use App\Plant;
use App\Planting;

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
        return view('planting.edit',compact('planting'));
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
        $plantings = Planting::all();
        $plantings2 = Planting::join('shelves', 'shelves.id', '=', 'plantings.shelf_id')
            ->join('plants', 'plants.id', '=', 'plantings.plant_id')
            ->select(
                'plantings.id',
                'shelves.name as shelf_name',
                'plants.name as plant_name',
                'plantings.planted_at',
                'plantings.closed_at',
                'plantings.created_at',
                'plantings.updated_at',
                'plantings.deleted_at'
                )
            ->get();
        //$users = User::select('id', 'name', 'email', 'created_at')->get();
        Excel::create('plantings', function($excel) use($plantings2) {
            $excel->sheet('Sheet 1', function($sheet) use($plantings2) {
                $sheet->fromArray($plantings2);
            });
        })->export('xls');
    }
    
}
