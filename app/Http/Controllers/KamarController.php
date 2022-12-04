<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kamar;


class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kamar::all();

        return $data;

        // return response()->json([
        //     "message" => "Load data success",
        //     "data" => $data
        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $table = Kamar::create([
        //     'no_kamar'=> $request->no_kamar,
        //     'harga'=> $request->harga,
        //     'fasilitas'=> $request->fasilitas,
        //     'status'=> $request->status

        // ]);

        // return response()->json([
        //     'success' => 201,
        //     'message' => 'Data berhasil disimpan',
        //     'data' => $table
        // ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = kamar::create([
            'no_kamar'=> $request->no_kamar,
            'harga'=> $request->harga,
            'fasilitas'=> $request->fasilitas,
            'status'=> $request->status

        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Data berhasil disimpan',
            'data' => $table
        ], 201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = kamar::find($id);
        if($table){

            return $table;
        }else{
            return ["message" => "not found"];
        }

        return response()->json([
            'success' => 201,
            'message' => 'Data berhasil disimpan',
            'data' => $table
        ], 201);

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
        $data = kamar::find($id);
        if($data){
            $data->no_kamar = $request->no_kamar ? $request->no_kamar : $data->no_kamar;
            $data->harga = $request->harga ? $request->harga : $data->harga;
            $data->fasilitas = $request->fasilitas ? $request->fasilitas : $data->fasilitas;
            $data->status = $request->status ? $request->status : $data->status;
        
            $data->save();

            return $data;
        }else{
            return ["message" => "Data  Tidak  Ditemukan"];
        }
    }



   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = kamar::find($id);
        if ($table){
            $table->delete();
            return ["messege" => "success"];
        }else{
            return ["messege" => "failed"];
        }
    }
}
