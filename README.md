# APIPRUEBA

Este repositorio radica en una Api pensada en realizar los metodos indicados por CRUD, ademas de dar las respuestas en formato .Json y HTML.

## Requerimientos
* CRUD donde se procese información personal (nombre, apellidos, teléfono, email, dirección, foto), el método GET debe proveer la información paginada y por lo menos tres filtros, el Content-type para estos end point es application/json.

* Generar un end point POST que trabaje con formato XML, donde se registre la lista de viajes de una persona. los datos del XML debe ser: fecha de viaje, país, ciudad, email de la persona como FK de la tabla.

* Utilizar Postman para generar las peticiones a la API.

## Trabajo realizado
Para la relización de este trabajo se tomaron los siguientes aspectos:
### Rutas.
En las rutas es donde se concentra el tipo de procedimientos que se llevan acabo en la Api. Como se trata de trabajar con los metodos pertenecientes a CRUD, es necesario el uso de los siguientes metodos:

| Metodo   | Utilización   |
|-------------|---------------|
| `POST ` | Crear registros |
| `GET ` | Obtener registros |
| `PUT ` | Alterar registros |
| `DELETE ` | Borrar registros |

Ambas tablas poseen la utilización de todos metodos mencionados,  no obstante el metodo  `GET ` fue utilizado más de una vez para obtener 3 diferentes tipos de vistas ( `HTML `,  `.json` y  `.json ` segun una id).


### Base de datos.
Se trabajó las migraciciones para la creacion de las tablas requeridas, es decir, que no habia la necesidad de usar migraciones para la creación de registros de usuarios, debido a que el Postman era el gestor de este tipo de peticiones.
Se puede interpretar la necesidad de tener una tabla usuarios y una tabla viajes. 
Estas migraciones hacen sus respectivas tablas en `mysql`
#### usuarios:
Esta tabla posee los siguientes atributos:

| Atributo   | Explicación   | Registro |
|-------------|---------------------|-----|
| id  | Llave primaria, incremental | Api |
| nombre | Campo de texto   | Usuario de la Api |
| apellido1 | Campo de texto   | Usuario de la Api |
| apellido2   | Campo de texto    | Usuario de la Api |
| telefono  | Campo de texto      | Usuario de la Api |
| email  | Campo de texto, llave unica    | Usuario de la Api |
| foto   | Campo de texto, con condicion de archivo para guardar la ruta y mover el archivo en una carpeta  | Usuario de la Api |
| created_at  | Fecha de creado    | Api |
| update_at   | Fecha de actualizado      | Api |

#### viajes:
Esta tabla posee los siguientes atributos:

| Atributo   | Explicación   | Registro |
|-------------|---------------------|---|
| id  | Llave primaria, incremental | Api |
| fecha | Campo de texto   | Usuario de la Api |
| pais | Campo de texto   | Usuario de la Api |
| ciudad | Campo de texto   | Usuario de la Api |
| email | Campo de texto, llave foranea que referencia al campo `email` de la tabla `usuarios`   | Usuario de la Api |
| created_at  | Fecha de creado    | Api |
| update_at   | Fecha de actualizado      | Api |
### Controladores.
Los controladores trabajan sobre los modelos segun las condiciones que los metodos de las rutas determinan, a continuación se explica para que se utilizaron las funciones:

| Funcion   | Llamada   | Explicación |
|-------------|---------------|-----|
| store | `POST` | Se utilizó para crear registros en `usuarios` y `viajes` segun datos dados por el usuario de la Api|
| store1 | `POST` | Se utilizó para crear un XML que contiene un registro para `viajes`|
| destroy | `DELETE` | Se utilizó para borrar un registro segun una `id` |
| index | `GET` | Se utilizó para paginar todos los registros en formato `HTML` |
| show | `GET` | Se utilizó para paginar todos los registros|
| showid | `GET` | Se utilizó para paginar todos los registros segun una `id` |
| edit | `PUT` | Se utilizó para editar todos los registros segun una `id`, disponible solo para la tabla `usuarios` |

Las anteriores funciones conllevan efectos en la misma base de datos a excepción de la funcion `store1` del controlador de `viajes`que se limitó a simplemente retornar un `.json`

Cumpliendo con el requisito de la utilización del `.json` para retornar resultados, se utilizó para casi todos los metodos la siguiente linea de codigo:
*  return response()->json($example);

### Vistas.
La mayoria de los metodos para cumplir los requerimientos retornan un `.json` pero los metodos `GET` manejan ademas formatos en `HTML` para demostrar un paginado diferente y facil de entender.
### Modelos.
Los modelos estan especificados para aliniarse con las tablas creadas en las migraciones, no obstante solo salvaguardan lalgunos atributos que son gestionados directa e indirectamente por el Usuario de la Api, mediante el uso de las funciones controladores.

## Pruebas
Gracias a Postman se fue realizando pruebas y correcciones en el codigo. Acontinuación se muestran el tipo de procedimientos que puede realizar la Api:

| Ruta   | Metodo   | Función | Tabla |
|--------|--------|-----|-----|
| /api/AgregarUsuario | `POST` | store | `usuarios` |
| /api/BorrarUsuario/{id} | `DELETE` | destroy | `usuarios` |
| /api/PaginadoUsuarios | `GET` | index | `usuarios` |
| /api/MostrarUsuarios | `GET` | show |  `usuarios` |
| /api/MostrarUsuario/{id} | `GET` | showid | `usuarios`  |
| /api/ActualizarUsuarios/{id} | `PUT` | edit | `usuarios` |
| /api/AgregarViajes1 | `POST` | store1 | `viajes` |
| /api/AgregarViajes  | `POST` | store | `viajes` |
| /api/BorrarViajes/{id} | `DELETE`| destroy | `viajes` |
| /api/PaginadoViajes | `GET` | index | `viajes` |
| /api/MostrarViajes | `GET` | show | `viajes` |
| /api/ActualizarViajes/{id} | `PUT` | edit | `viajes` |

Las rutas que terminen en `/{id}` quieren indicar que se necesita un numero que corresponda a un dato de tipo `id` en la tabla en cuestion con la ruta.
