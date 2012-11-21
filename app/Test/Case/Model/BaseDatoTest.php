<?php
App::uses('BaseDato', 'Model');

/**
 * BaseDato Test Case
 *
 */
class BaseDatoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.base_dato',
		'app.empresa',
		'app.base_datos_empresa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BaseDato = ClassRegistry::init('BaseDato');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BaseDato);

		parent::tearDown();
	}

}
