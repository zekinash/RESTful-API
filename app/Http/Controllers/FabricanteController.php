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
			return response()->json(['data' => 'No se pudo crear el fabricante'], '422');
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
			return response()->json(['data' => 'No se encuentra el fabricante con id ' . $id], '404');
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return 'Mostrando formulario para actualizar el fabricante con id: ' . $id;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return 'Mostrando formulario para eliminar el fabricante con id: ' . $id;
	}

}
