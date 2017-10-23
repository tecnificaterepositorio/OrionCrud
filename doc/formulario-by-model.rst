Formulario guíado por modelo
============================
Para el funcionamiento óptimo de la librería en la creación y edición de registros guiado por modelo, se recomienda utilizar el siguiente formulario, el cual, se encuentra totalmente adaptado:

.. literalinclude:: ../code/form.blade.php
	:language: php

.. note::
	Se debe de tener previo la siguiente configuración en el constructor del controlador:

	.. literalinclude:: ../code/ExampleController.php
		:language: php
		:lines: 9 - 18

Creación de registros
---------------------

La parte de creación de registros se componen de varias partes, las cuales se describirán a continuación:

**1. Arreglo general** (``$data``):

* Llave ``title``, es el título en el formulario.
* Llave ``url``, es la url por el cual se enviará la información.
* Llave ``id``, es la identificación del formulario (se utiliza en algunos casos para los eventos con JQuery).
* Llave ``return_url``, es la url por el cual se pondrá a un botón para salir del formulario.
* Llave ``forms``, es la llamada a la librería ``form``. Recibe como parámetro el nombre del modelo y el método (``method``) por el cual se encuentran los campos.

.. literalinclude:: ../code/ExampleController.php
	:language: php
	:lines: 20 - 27

**2. Recepción de datos** (``POST`` - ``GET``):

Esta parte del código se encarga de recibir los datos por ``POST``. Por el método ``GET`` funciona de manera similar.

.. literalinclude:: ../code/ExampleController.php
	:language: php
	:lines: 28 - 33

Al final, el método ``add`` tendrá:

.. literalinclude:: ../code/ExampleController.php
	:language: php
	:lines: 19 - 35

Edición de registros
---------------------

Con respecto al método de creación de registro, el método ``edit`` cambia en:

* Recibe el parámetro ``$object_id`` el cual contiene el código del registro a actualizar.
* La llave ``url`` en el arreglo ``$data`` cambia (se recuerda que ésta hace referencia a la url a enviar los datos).
* Se llama al método ``update_example`` del modelo, el cual se encarga de actualizar los registros. Ésta recibe el parámetro arreglo ``$data`` (contiene los datos a actualizar) y el parámetro ``$object_id`` (contiene el código del registro).
* Los parámetros de la función ``get_fields_model`` en la llave ``forms`` en el arreglo ``$data`` cambia, como segundo parámetro se envía adicional la llave ``table_id`` en el arreglo:
     - Llave ``table_id`` recibe el código del registro.

Al final, el método ``edit`` tendrá:

.. literalinclude:: ../code/ExampleController.php
	:language: php
	:lines: 36 - 52