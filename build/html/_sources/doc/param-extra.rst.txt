Parámetros extra
=================

En esta sección, se tiene en cuenta parámetros o configuraciones adicionales para los formularios.

Campos dependientes
--------------------

Se debe de agregar en el modelo (``ExampleModel``), dentro del campo la llave ``'dependent' => true`` con el fin de hacer ese campo como dependiente. Por lo general se usa en los select dependientes o anidados.

.. note::
	En caso de que se requiera usar Departamentos y Municipios, basta no más con poner en el modelo el campo ``municipio_id`` y automáticamente la librería pondrá el campo Departamento y lo hará anidado.

Carga de imágenes
------------------

Para la carga de imágenes, se debe de agregar las siguientes configuraciones dentro del controlador:

* Un arreglo constante, el cual incluya el path o dirreción a donde guardar los archivos y los tipos de archivos aceptados (va por fuera del constructor).

.. literalinclude:: ../code/ExampleController.php
	:language: php
	:lines: 64 - 67

* Carga de librería file en el controlador (va por dentro del constructor).

.. literalinclude:: ../code/ExampleController.php
	:language: php
	:lines: 68 - 70

* Carga de parámetros a la librería file (va por dentro del constructor).

.. literalinclude:: ../code/ExampleController.php
	:language: php
	:lines: 71

* Dentro del formulario, se debe agregar ``$this->upload->do_upload('file');`` para subir el archivo y ``$data['file_name'] = $this->upload->data()['file_name'];`` para agregar al campo la dirrección en donde se guardó el archivo.

.. literalinclude:: ../code/ExampleController.php
	:language: php
	:lines: 72 - 81

.. note::
	Para el uso de carga de archivos, se debe utilizar la librería para ello (contactarse con el equipo de desarrollo para adquirir la librería).