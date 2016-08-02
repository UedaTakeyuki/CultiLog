<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Shelf;
use App\Plant;
use App\Planting;

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
            $planting_id = $id;
            return view('planting.create',compact('planting_id'));
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
 
        // ③記事一覧へリダイレクト
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
        Planting::destroy($id);
        return redirect('planting');
    }
}
