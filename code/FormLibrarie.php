<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Forms{
	protected $ci;
	public $call_model_array;
	const class_form_input = 'form-control';
	const class_form_select = 'form-select';
	const class_form_date = 'form-date';

	public function __construct(){
		$this->ci =& get_instance();
		$this->ci->load->model([
			'ExampleModel',
		]);
		$this->call_model_array = [
			'example' => new ExampleModel(),
		];
		$this->get_model_name_array = [
			'example_id' => 'example',
		];
	}
}
?>