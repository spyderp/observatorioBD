<?php
App::uses('SistemaOperativo', 'Model');

/**
 * SistemaOperativo Test Case
 *
 */
class SistemaOperativoTest extends CakeTestCase {

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
		'app.lenguaj',
		'app.empresas_lenguaj',
		'app.empresas_sistema_operativo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SistemaOperativo = ClassRegistry::init('SistemaOperativo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SistemaOperativo);

		parent::tearDown();
	}

}
