<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model {

	protected $table = 'vehiculos';

	protected $primaryKey = 'serie';

	protected $fillable = array('color', 'cilindrada', 'potencia', 'peso');


	/*
		Relación de Vehículo con fabricante.
		-1 Vehículo pertenece a 1 Fabricante
	*/
	public function fabricante(){

		$this->belongsTo('Fabricante');

	}

}
