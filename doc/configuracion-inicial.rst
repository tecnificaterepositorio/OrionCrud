Configuración inicial
========================

Integración
---------------

Una vez se tenga instalada la librería en la carpeta libraries (path ``/application/libraries``), se procederá a realizar la configuración inicial. Se deberá agregar el modelo en dos variables, las cuales están en forma de arreglo. 

En la línea ``$this->ci->load->model``, se deberá agregar el modelo para que la librería lo reconozca:

.. literalinclude:: ../code/FormLibrarie.php
	:language: php
	:lines: 12 - 14

En la línea ``$this->call_model_array`` se le asigna a una llave del arreglo la instancia al modelo a importar:

.. literalinclude:: ../code/FormLibrarie.php
	:language: php
	:lines: 15 - 17

Para cada modelo, deberá estar extendido por la librería Eloquent de la siguiente forma:

.. literalinclude:: ../code/ExampleModel.php
	:language: php
	:lines: 6

Seguido de ello, se deberá poner lo siguiente dentro del modelo:

.. literalinclude:: ../code/ExampleModel.php
	:language: php
	:lines: 8 - 9

Métodos bases
------------------

Dentro de cada modelo se deberá cuatro métodos, las cuales, se ponen a continuación con una breve explicación de su finalidad:

example_form
""""""""""""""""""

Aquí se ponen los fields - campos de la tabla de la base de datos sin el campo primario (por lo general es id).

.. literalinclude:: ../code/ExampleModel.php
	:language: php
	:lines: 11 - 26

get_data
"""""""""""""""

El método ``get_data`` funciona para dar los datos. Por lo general, recibe el parámetro ``$id`` y consulta el registro en el modelo ``ExampleModel`` para devolver el resultado encontrado.

.. literalinclude:: ../code/ExampleModel.php
	:language: php
	:lines: 27 - 29

save_example
"""""""""""""""""""

El método ``save_example`` funciona para guardar los datos. Recibe el arreglo ``$data`` en el que se incluye los datos a guardar en el modelo

.. literalinclude:: ../code/ExampleModel.php
	:language: php
	:lines: 30 - 32

update_example
"""""""""""""""""""""

El método ``update_example`` funciona para actualizar los datos de un registro. Recibe como parámetro el arreglo ``$data`` que incluye los datos a actualizar y el parámetro ``$id`` que incluye el código del registro a actualizar.

.. literalinclude:: ../code/ExampleModel.php
	:language: php
	:lines: 33 - 36