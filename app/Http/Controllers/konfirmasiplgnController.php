<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kode;

class konfirmasiplgnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kode::all();

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = kode::create([
            'code'=> $request->code ,
            'status_pembayaran'=> $request->status_pembayaran,
            'checkin' => $request->checkin,
            'checkout'=> $request->checkout


        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = kode::find($id);
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
        $data = kode::find($id);
        if($data){
            $data->code = $request->code ? $request->code : $data->code;
            $data->status_pembayaran = $request->status_pembayaran ? $request->status_pembayaran : $data->status_pembayaran;
            $data->checkin = $request->checkin ? $request->checkin : $data->checkin;
            $data->checkout = $request->checkout ? $request->checkout : $data->checkout;
        
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
    
}
