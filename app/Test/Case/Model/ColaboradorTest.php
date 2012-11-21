<?php
App::uses('Colaborador', 'Model');

/**
 * Colaborador Test Case
 *
 */
class ColaboradorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.colaborador',
		'app.empresa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Colaborador = ClassRegistry::init('Colaborador');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Colaborador);

		parent::tearDown();
	}

}
