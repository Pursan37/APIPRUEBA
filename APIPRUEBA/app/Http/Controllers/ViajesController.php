<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Viajes;

class ViajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $viajes = new Viajes();
        $viajes->fecha=$request->input('fecha');
        $viajes->pais=$request->input('pais');
        $viajes->ciudad=$request->input('cuidad');
        $viajes->email=$request->input('email');
        $viajes->save();
        return response()->json($viajes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viajes = Viajes::all();
        return response()->json($viajes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $viajes = Viajes::find($id);
        $viajes->fecha=$request->input('fecha');
        $viajes->pais=$request->input('pais');
        $viajes->ciudad=$request->input('cuidad');
        $viajes->email=$request->input('email');
        $viajes->save();
        return response()->json($viajes);
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
        $viajes = Viajes::find($id);
        $viajes->delete();
        return response()->json($viajes);
    }
}
