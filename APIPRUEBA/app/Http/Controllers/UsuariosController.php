<?php

namespace App\Http\Controllers;

use App\Usuarios;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Usuarios::simplePaginate(4);
        return view('usuarios.index', compact('users'));
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
        //en caso de que sea recibido un archivo
        if($request->hasFile('foto')){
            //se capta la ubicacion del archivo
            $usuarios->foto = $request->file('foto');
            //se toman los registros del tiempo y nombre original
            $name =time().$usuarios->foto->getClientOriginalName();
            //se mueve el archivo y se renombra con una composicion de la fecha y el nombre, para no repetir imagenes
            $usuarios->foto->move(public_path().'/imagenes/',$name);
        }else{//en las pruebas con el postman puede causar confuncion, en dado caso no se especifique el tipo de registro como file, se captara el texto que desee
            $usuarios->foto = $request->input('foto');
        }
        //se guardan en el modelo
        $usuarios->save();
        //se regresa una respuesta en json
        return response()->json($usuarios);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {//pasan todos los datos del modelo
        $usuarios = Usuarios::all();
        return response()->json($usuarios);
    }

    public function showid($id)
    { //busca en el modelo un registro segun el id
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
    {  //busca en el modelo un registro segun el id
        $usuarios = Usuarios::find($id);
        //se corrigen los datos
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
    {  //busca en el modelo un registro segun el id
        $usuarios = Usuarios::find($id);
        //elimina el registro encontrado
        $usuarios->delete();
        //retorna el registro eliminado
        return response()->json($usuarios);
    }
}
