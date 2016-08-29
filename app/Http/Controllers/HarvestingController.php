<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Planting;
use App\Harvesting;

use Excel;

class HarvestingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $harvestings = Harvesting::all();
        //echo var_dump($harvestings);
        return view('harvesting.index', compact('harvestings'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $planting_id
     * @return \Illuminate\Http\Response
     */
    public function create($planting_id)
    {
        //
        $planting = Planting::findOrFail($planting_id);
        return view('harvesting.create',compact('planting'));

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
        // ①フォームの入力値を取得
        $inputs = \Request::all();
 
        // ②マスアサインメントを使って、記事をDBに作成
        Harvesting::create($inputs);

        // ③記事一覧へリダイレクト
        //return redirect('planting.show',$inputs['planting_id']);
        return redirect("planting/".$inputs['planting_id']);

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
    }
    
    public function excel()
    {
        //
        $harvestings = Harvesting::all();
        $harvestings2 = Harvesting::join('plantings', 'plantings.id', '=', 'harvestings.planting_id')
            ->join('shelves', 'shelves.id', '=', 'plantings.shelf_id')
            ->join('plants', 'plants.id', '=', 'plantings.plant_id')
            ->select(
                'harvestings.id as harvesting_id',
                'shelves.name as shelf_name',
                'plants.name as plant_name',
                'plantings.id as planting_id',
                'plantings.planted_at',
                'harvestings.harvested_at',
                'harvestings.weight',
                'harvestings.created_at',
                'harvestings.updated_at',
                'harvestings.deleted_at'
                )
            ->get();
        //$users = User::select('id', 'name', 'email', 'created_at')->get();
        Excel::create('harvestings', function($excel) use($harvestings2) {
            $excel->sheet('Sheet 1', function($sheet) use($harvestings2) {
                $sheet->fromArray($harvestings2);
            });
        })->export('xls');
    }

}
