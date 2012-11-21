<?php
App::uses('Universidad', 'Model');

/**
 * Universidad Test Case
 *
 */
class UniversidadTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.universidad',
		'app.carrera',
		'app.titulo',
		'app.recursos_humano',
		'app.idioma',
		'app.idiomas_recursos_humano',
		'app.detalles_universidad',
		'app.alianza',
		'app.alianzas_universidad'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Universidad = ClassRegistry::init('Universidad');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Universidad);

		parent::tearDown();
	}

}
