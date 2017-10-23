<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	use libraries\Auth as auth; $auth = new namespace\auth; 
?>

@extends('dir_path_base_html')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<!-- Título del formulario -->
			<span><b><?= $title ?></b></span>
		</div>
		<!-- Creación del formulario -->
		<?= form_open_multipart($url, array('id' => $id, 'name' => 'form', 'method' => (isset($method) ? 'get': 'post'))) ?>
			<div class="panel-body">
				<?php
					// El form_html recibe un arreglo que incluye los inputs
					foreach($forms as $form){
						if($form['label'] != ''){
				?>
							<div class="col-md-12">
								<div class="row">
									<div class="form-group row">
										<div class="col-md-3">
											<label><?= $form['label'] ?></label>
										</div>
										<?php
											$col = 'col-md-9';
											// En caso de que el input sea tipo file (adjuntar contenido multimedia o de texto plano)
											if($form['type'] == 'file' and $url_image != ''){
												$col = 'col-md-8';
												echo '
													<div class="col-md-1 text-center">
														<img height="60" src="'.$url_image.$form['value'].'" />
													</div>
												';
											}
										?>
										<div class="<?= $col ?>">
											<!-- Caso normal (solo tipo input, select, textarea) -->
											<?= $form['input'] ?>
										</div>
									</div>
								</div>
							</div>
				<?php
						}else{
							echo $form['input'];
						}
					}
				?>
			</div>
			<div class="panel-footer">
				<!-- Recibe una url para retornar -->
				<a href="<?=base_url($return_url)?>" class="btn btn-default pull-left">Volver</a>
				<input type="submit" class="btn btn-primary pull-right" name="save" value="Enviar">
			</div>
		<?= form_close() ?>
	</div>
@endsection