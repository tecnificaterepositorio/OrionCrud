Formulario no guíado por modelo
===============================

El uso es similar con respecto al formulario guiado por modelo. Se debe tener en cuenta:

* El método para llamar el formulario es ``get_fields_form`` en la llave ``forms`` del arreglo ``$data``, quedando de la siguiente manera:

.. literalinclude:: ../code/ExampleController.php
	:language: php
	:lines: 60

Este tipo de formulario se utiliza generalmente para formularios tipo reportes. Al final, el método quedará de la siguiente manera:

.. literalinclude:: ../code/ExampleController.php
	:language: php
	:lines: 53 - 63