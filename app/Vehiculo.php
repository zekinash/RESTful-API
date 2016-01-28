<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model {

	protected $table = 'vehiculos';

	protected $primaryKey = 'serie';

	protected $fillable = array('color', 'cilindrada', 'potencia', 'peso', 'fabricante_id');

	protected $hidden = array('updated_at', 'created_at');


	/*
		Relación de Vehículo con fabricante.
		-1 Vehículo pertenece a 1 Fabricante
	*/
	public function fabricante(){

		return $this->belongsTo('App\Fabricante');

	}

}
