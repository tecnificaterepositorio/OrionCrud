<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class ExampleModel extends Eloquent{

protected $table = 'example_table'; // Nombre de la tabla
public $timestamps = false; // Poner esta línea si no existe el campo timestamp en la tabla

public function example_form(){
	return [
		'field_one' => [ // Nombre del campo en la bd
			'required' => true, // Lleva false o true dependiendo si el campo es requerido
			'label' => 'Field one', // Nombre del campo a mostrar en el formulario
			'class' => '', // Atributo clase de css a mostrar
			'type' => 'text' // Tipo de campo (text, select, file)
		],
		'field_two' => [ // Nombre del campo en la bd
			'required' => true, // Lleva false o true dependiendo si el campo es requerido
			'label' => 'Field two', // Nombre del campo a mostrar en el formulario
			'class' => '', // Atributo clase de css a mostrar
			'type' => 'select' // Tipo de campo (text, select, file)
		]
	];
}
public function get_data($id){ // Recibe el parámetro $id
	return ExampleModel::where('id', $id)->first()->toArray(); // Nombre del modelo a obtener los datos
}
public function save_example($data){ // Recibe un arreglo con los datos a guardar
	return ExampleModel::insert($data); // Guarda los datos
}
public function update_example($data, $id){ // Recibe un arreglo de los datos a actualizar y un id para buscar el registro a actualizar
	$example = ExampleModel::where('id', $id); // Busca el registro de acuerdo al id
	return $example->update($data); // Actualiza los datos recibidos en $data en el registro encontrado
}
public function example_form(){
	return [
		'file_image' => [
			'required' => true/false,
			'label' => 'image',
			'class' => '',
			'type' => 'file'
		],
	];
}
}