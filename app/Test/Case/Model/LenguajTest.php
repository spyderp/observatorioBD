<?php
App::uses('Lenguaj', 'Model');

/**
 * Lenguaj Test Case
 *
 */
class LenguajTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lenguaj',
		'app.empresa',
		'app.colaborador',
		'app.aplicacion',
		'app.aplicaciones_empresa',
		'app.base_dato',
		'app.base_datos_empresa',
		'app.lenguaje',
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
		$this->Lenguaj = ClassRegistry::init('Lenguaj');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lenguaj);

		parent::tearDown();
	}

}
