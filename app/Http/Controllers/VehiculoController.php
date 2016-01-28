<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Vehiculo;

class VehiculoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return response()->json(['data' => Vehiculo::all()], 200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$vehiculo = Vehiculo::find($id);

		if(!$vehiculo){
			return response()->json(['data' => 'No se encuentra el vehiculo con id ' . $id], '404');
		} else {
			return response()->json(['data' => $vehiculo], 200);
		}
	}

}
