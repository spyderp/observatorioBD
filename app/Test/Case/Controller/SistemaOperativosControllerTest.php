<?php
App::uses('SistemaOperativosController', 'Controller');

/**
 * SistemaOperativosController Test Case
 *
 */
class SistemaOperativosControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sistema_operativo',
		'app.empresa',
		'app.colaborador',
		'app.aplicacion',
		'app.aplicaciones_empresa',
		'app.base_dato',
		'app.base_datos_empresa',
		'app.lenguaje',
		'app.empresas_lenguaj',
		'app.empresas_sistema_operativo'
	);

}
