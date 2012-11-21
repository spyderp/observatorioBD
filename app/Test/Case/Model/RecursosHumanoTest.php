<?php
App::uses('RecursosHumano', 'Model');

/**
 * RecursosHumano Test Case
 *
 */
class RecursosHumanoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.recursos_humano',
		'app.idioma',
		'app.idiomas_recursos_humano'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RecursosHumano = ClassRegistry::init('RecursosHumano');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RecursosHumano);

		parent::tearDown();
	}

}
