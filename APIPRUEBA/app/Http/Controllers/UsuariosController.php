<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Usuarios;


class UsuariosController extends Controller
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
        $usuarios = new Usuarios();
        $usuarios->nombre = $request->input('nombre');
        $usuarios->apellido1 = $request->input('apellido1');
        $usuarios->apellido2 = $request->input('apellido2');
        $usuarios->telefono = $request->input('telefono');
        $usuarios->email = $request->input('email');
        $usuarios->foto = $request->input('foto');
        $usuarios->save();
        return response()->json($usuarios);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $usuarios = Usuarios::all();
        return response()->json($usuarios);
    }

    public function showid($id)
    {
        $usuarios = Usuarios::find($id);
        return response()->json($usuarios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $usuarios = Usuarios::find($id);
        $usuarios->nombre = $request->input('nombre');
        $usuarios->apellido1 = $request->input('apellido1');
        $usuarios->apellido2 = $request->input('apellido2');
        $usuarios->telefono = $request->input('telefono');
        $usuarios->email = $request->input('email');
        $usuarios->foto = $request->input('foto');
        $usuarios->save();
        return response()->json($usuarios);
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
        $usuarios = Usuarios::find($id);
        $usuarios->delete();
        return response()->json($usuarios);
    }
}
