<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Plant;

use Excel;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $plants = Plant::all();
        $plants = Plant::orderBy('kana', 'ASC')->get();
        return view('plant.index', compact('plants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('plant.create');
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
        Plant::create($inputs);
 
        // ③記事一覧へリダイレクト
        return redirect('plant');
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
        $plant = Plant::findOrFail($id);
        return view('plant.show', compact('plant'));
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
        $plant = Plant::findOrFail($id);
        return view('plant.edit', compact('plant'));
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
        $plant = Plant::findOrFail($id);
        $plant->update($request->all());
        return redirect(url('plant', [$plant->id]));

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
        $plants = Plant::orderBy('kana', 'ASC')->get();
        
        //$users = User::select('id', 'name', 'email', 'created_at')->get();
        Excel::create('plant', function($excel) use($plants) {
            $excel->sheet('Sheet 1', function($sheet) use($plants) {
                $sheet->fromArray($plants);
            });
        })->export('xls');
    }
}
