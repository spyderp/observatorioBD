<?php
App::uses('Titulo', 'Model');

/**
 * Titulo Test Case
 *
 */
class TituloTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.titulo',
		'app.recursos_humano',
		'app.idioma',
		'app.idiomas_recursos_humano',
		'app.carrera',
		'app.universidad'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Titulo = ClassRegistry::init('Titulo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Titulo);

		parent::tearDown();
	}

}
