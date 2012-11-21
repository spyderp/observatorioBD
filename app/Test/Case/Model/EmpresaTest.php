<?php
App::uses('Empresa', 'Model');

/**
 * Empresa Test Case
 *
 */
class EmpresaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.empresa',
		'app.colaborador',
		'app.aplicacion',
		'app.aplicaciones_empresa',
		'app.base_dato',
		'app.base_datos_empresa',
		'app.lenguaj',
		'app.empresas_lenguaj',
		'app.sistema_operativo',
		'app.empresas_sistema_operativo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Empresa = ClassRegistry::init('Empresa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Empresa);

		parent::tearDown();
	}

}
