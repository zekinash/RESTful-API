<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Fabricante;

class FabricanteController extends Controller {

	public function __construct(){

		$this->middleware('auth.basic', ['only' => ['store', 'update', 'destroy']]);
		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return response()->json(['data' => Fabricante::all()], 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return 'Mostrando formulario para crear un fabricante';
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		if(!$request->input('nombre') or !$request->input('telefono')) {
			return response()->json(['data' => 'No se pudo crear el fabricante'], 422);
		}
		
		Fabricante::create($request->all());

		return response()->json(['data' => 'El fabricante se ha creado correctamente'], 200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$fabricante = Fabricante::find($id);

		if(!$fabricante){
			return response()->json(['data' => 'No se encuentra el fabricante con id ' . $id], 404);
		}
		
		return response()->json(['data' => $fabricante], 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return 'Mostrando formulario para editar el fabricante con id: ' . $id;
	}

	/**
	 * Update the specified resource in storage.
	 * Se utiliza en postman x-www-form-urlencoded
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{

		$fabricante = Fabricante::find($id);

		if(!$fabricante){
			return response()->json(['data' => 'No se encuentra el fabricante con id ' . $id], 404);
		}

		$metodo = $request->method();

		$nombre = $request->input('nombre');
		$telefono = $request->input('telefono');

		$flag = false;

		if( $metodo == 'PATCH' ){

			if($nombre != null and $nombre != ''){
				$fabricante->nombre = $nombre;
				$flag = true;
			}

			if($telefono != null and $telefono != ''){
				$fabricante->telefono = $telefono;
				$flag = true;
			}

			if( $flag ){

				$fabricante->save();

				return response()->json(['data' => 'Se ha actualizado el fabricante.'], 200);

			}

			return response()->json(['data' => 'No se modificó ningún fabricante.'], 304);

		}

		if( !$nombre or !$telefono ){
			return response()->json(['data' => 'Faltan campos para actualizar'], 422);
		}

		$fabricante->nombre = $nombre;
		$fabricante->telefono = $telefono;

		$fabricante->save();

		return response()->json(['data' => 'Se ha actualizado el fabricante.'], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$fabricante = Fabricante::find($id);

		if( !$fabricante ){
			return response()->json(['data' => 'No se encuentra el fabricante con id ' . $id], 404);
		}

		$vehiculos = $fabricante->vehiculos;

		if( sizeof($vehiculos) > 0 ){
			return response()->json(['data' => 'Este fabricante posee vehículos y no puede ser eliminado. Eliminar primero todos los vehículos asociados a este fabricante.'], 409);
		}

		$fabricante->delete();

		return response()->json(['data' => 'Se ha actualizado el fabricante.'], 204);
	}

}
