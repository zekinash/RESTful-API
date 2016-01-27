<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model {

	protected $table = 'fabricantes';
	
	protected $fillable = array('nombre', 'telefono');


	/*
		Relación de Fabricante con Vehículo
		-1 Fabricante tiene muchos Vehículos
	*/
	public function vehiculos(){

		$this->hasMany('Vehiculo');

	}

}
