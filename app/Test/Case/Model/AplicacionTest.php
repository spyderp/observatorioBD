<?php
App::uses('Aplicacion', 'Model');

/**
 * Aplicacion Test Case
 *
 */
class AplicacionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.aplicacion',
		'app.empresa',
		'app.aplicaciones_empresa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Aplicacion = ClassRegistry::init('Aplicacion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Aplicacion);

		parent::tearDown();
	}

}
