<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Fabricante;
use App\Vehiculo;

class FabricanteVehiculoController extends Controller {

	public function __construct(){

		$this->middleware('auth.basic', ['only' => ['store', 'update', 'destroy']]);
		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$fabricante = Fabricante::find($id);

		if(!$fabricante){
			return response()->json(['data' => 'El fabricante con id ' . $id . ' no existe.'], 404);
		}
		

		return response()->json(['data' => $fabricante->vehiculos], 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		return 'Mostrando formulario para crear un vehículo del fabricante con id ' . $id;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, $id)
	{
		$fabricante = Fabricante::find($id);

		if(!$fabricante){
			return response()->json(['data' => 'El fabricante con id ' . $id. ' no existe. No se puede dar de alta el vehículo.'], 404);
		}

		if( !$request->input('color') or !$request->input('cilindrada') or !$request->input('potencia') or !$request->input('peso') ) {
			return response()->json(['data' => 'No se pudo crear el vehículo. Faltan datos.'], 422);
		}
		
		$fabricante->vehiculos()->create($request->all());

		return response()->json(['data' => 'El vehículo se ha creado correctamente'], 200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($idFabricante, $idVehiculo)
	{
		return 'Mostramos el vehículo con id ' . $idVehiculo . ' del fabricante con id ' . $idFabricante;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($idFabricante, $idVehiculo)
	{
		return 'Mostramos el formulario para editar vehículo con id ' . $idVehiculo . ' del fabricante con id ' . $idFabricante;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($idFabricante, $idVehiculo)
	{
		return 'Actualizamos el vehículo con id ' . $idVehiculo . ' del fabricante con id ' . $idFabricante;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($idFabricante, $idVehiculo)
	{
		return 'Eliminamos el vehículo con id ' . $idVehiculo . ' del fabricante con id ' . $idFabricante;
	}

}
