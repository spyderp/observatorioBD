<?php
App::uses('DetallesUniversidad', 'Model');

/**
 * DetallesUniversidad Test Case
 *
 */
class DetallesUniversidadTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.detalles_universidad',
		'app.universidad'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DetallesUniversidad = ClassRegistry::init('DetallesUniversidad');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DetallesUniversidad);

		parent::tearDown();
	}

}
