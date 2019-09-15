<?php

namespace App\Http\Controllers;

use Spatie\ArrayToXml\ArrayToXml;
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
    {   //deacuerdo al modelo viajes paginaremos los viajes
        $viajes = Viajes::simplePaginate(4);
        //returna la vista de html con base a los datos del modelo
        return view('viajes.index', compact('viajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //la estructura de un post para recibir datos y regresar un json
        $viajes = new Viajes();
        $viajes->fecha = $request->input('fecha');
        $viajes->pais = $request->input('pais');
        $viajes->ciudad = $request->input('ciudad');
        $viajes->email = $request->input('email');
        $viajes->save();
        return response()->json($viajes);
    }


    public function store1(Request $request)
    {  //Un array simple con estructura xml
        $array = [
            'viajes' => [
                'fecha' => '2019-09-01 00:00:00',
                'pais' => 'colombia',
                'ciudad'=>'barranquilla',
                'email'=>'andreajanner1@gmail.com'
            ],
            'viajes' => [
                'fecha' => '2019-09-01 00:00:00',
                'pais' => 'colombia',
                'ciudad'=>'barranquilla',
                'email'=>'andreajanner3@gmail.com'
            ],
            'viajes' => [
                'fecha' => '2019-09-01 00:00:00',
                'pais' => 'colombia',
                'ciudad'=>'barranquilla',
                'email'=>'andreajanner2@gmail.com'
            ]

        ];
        //Proceso para convertir el array a xml y posteriormente decodificarlo en json
        $result  =  ArrayToXml :: convert ($array);
        $xml = simplexml_load_string($result);
        $st_json =json_encode($xml);
        $json =json_decode($st_json);

        return response()->json($json);
        //intente pasar los datos al modelo una vez se encuentre en el json, pero no me alcanzo el tiempo
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //muestra todas los registros del modelo
        $viajes = Viajes::all();
        //retorna
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
        //busca en el modelo un registro segun el id
        $viajes = Viajes::find($id);
        //se corrigen los datos
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
    public function update(Request $request)
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
        //busca el id dentro del modelo
        $viajes = Viajes::find($id);
        //elimina el registro encontrado
        $viajes->delete();
        //retorna el registro eliminado
        return response()->json($viajes);
    }
}
