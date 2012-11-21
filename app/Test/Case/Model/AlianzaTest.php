<?php
App::uses('Alianza', 'Model');

/**
 * Alianza Test Case
 *
 */
class AlianzaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.alianza',
		'app.universidad',
		'app.alianzas_universidad'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Alianza = ClassRegistry::init('Alianza');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Alianza);

		parent::tearDown();
	}

}
