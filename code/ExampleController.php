<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExampleController extends CI_Controller {

// Variable constante para la ubicacion de los templates de recursos
const dir_template = 'dir_template/example/';
const controller = 'example';
public function __construct(){
	parent::__construct();
	$this->load->database();
	$this->load->model([
		'ExmapleModel', // Nombre del modelo
	]);
	$this->load->library([
		'forms', // Llamada a la librería
	]);
}
public function add(){
	$data = [
		'title' => 'Agregar', // Título en el formularo
		'url' => 'example/agregar/', // URL para enviar el formulario
		'id' => 'form-example', // Identificación del formulario
		'return_url' => 'example', // URL de retorno
		// Llamada a la funcion get_fields_model de forms enviando el nombre de la tabla
		'forms' => $this->forms->get_fields_model('example', ['method' => 'example_form'])
	];
	if($this->input->post('save') != ''){ // En caso de que haya recibido los datos por POST
		$data = $this->input->post();
		unset($data['save']); // Elimina el campo save (corresponde al input submit)
		$this->ExampleModel->save_example($data); // Envío de datos al modelo para guardarlos en el método save_example. Se debe de enviar $data el cual contiene los datos a guardar
		redirect('example', 'refresh'); // URL de retorno después de haber guardado los datos
	}
	$this->blade->view('dir_template/elements/form', $data); // Llamada al template general con parámetros establecidos en $data
}
public function edit($object_id){ // Recibe el parámetro $object_id, el cual es el código del registro a actualizar
	$data = [
		'title' => 'Editar', // Título en el formularo
		'url' => 'example/editar/'.$object_id, // URL para enviar el formulario
		'id' => 'form-example', // Identificación del formulario
		'return_url' => 'example', // URL de retorno
		// Llamada a la funcion get_fields_model de forms enviando el nombre de la tabla y el id
		'forms' => $this->forms->get_fields_model('example', ['table_id' => $object_id, 'method' => 'example_form'])
	];
	if($this->input->post('save') != ''){ // En caso de que haya recibido los datos por POST
		$data = $this->input->post();
		unset($data['save'], $data['id']); // Elimina el campo save (corresponde al input submit) y el idm del registro
		$this->ExampleModel->update_example($data, $object_id); // Envío de datos al modelo para actualizarlos en el método update_example. Se debe de enviar $data el cual contiene los datos a actualizar y el $object_id el cual es el código del registro a actualizar
		redirect('example', 'refresh'); // URL de retorno después de haber guardado los datos
	}
	$this->blade->view('dir_template/elements/form', $data); // Llamada al template general con parámetros establecidos en $data
}
public function form_without_model(){
	$data = [
		'title' => 'Title',
		'url' => 'url',
		'id' => 'form-without-model',
		'return_url' => 'return-url',
		'method' => 'get/post',
		'forms' => $this->forms->get_fields_form('example', ['field_name' => 'field_name_identify', 'method' => 'example_form'])
	];
	$this->blade->view('dir_template/elements/form', $data);
}
const info_upload = [
	'upload_path' => './path_to_save_file', // Dirreción donde guarda los archivos
	'allowed_types' => '*' // Tipos de archivos aceptados
];
$this->load->helper([
	'file',
]);
$this->load->library('upload', self::info_upload);
public function add(){
	// code
	if($this->input->post('save') != ''){
		$this->upload->do_upload('file'); // Guardar el archivo en el hosting
		$data = $this->input->post();
		$data['file_name'] = $this->upload->data()['file_name']; // Asigna al campo file la dirrección del archivo guardado
		// code to save
	}
	// code
}
}