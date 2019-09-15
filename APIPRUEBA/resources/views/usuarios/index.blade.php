
@section('content')

    <div class="row justify-content-center">
        <style>
            #cuadro{
                width: 330px;
                background: #090909;
                color: #fff;
                margin-top: 5px;
                padding: 5px 5px 30px 5px;
                border-top: 30px solid #141414;
                border-right: 30px solid #141414;
                border-left: 30px solid #141414;
                border-radius: 6px;
                opacity: 0.8;
            }
        </style>
        <div class="col-md-6">
            <h1>USUARIOS</h1>
                //formato sensillo donde cada renglon contiene informacion del registro
            <ul class="list-group mb-2">
                <tr>
                @foreach($users as $user)
                        <div id="cuadro">
                        <div class="list-group-item", id="renglon">Nombre : {{ $user->nombre }}  {{$user->apellido1}}  {{$user->apellido2}} </div>
                        <div class="list-group-item", id="renglon"> Telefono : {{$user->telefono}} </div>
                        <div class="list-group-item", id="renglon"> Email : {{$user->email}} </div>
                        </div>

                @endforeach
                </tr>
            </ul>
            <h3><div>{{$users->links()}}</div></h3>



        </div>


    </div>