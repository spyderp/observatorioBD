<?php
/**
 * DetallesUniversidadFixture
 *
 */
class DetallesUniversidadFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'detallesUniversidades';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'ano_egreso' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 9),
		'ano_decersion' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 9),
		'year' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 4),
		'universidad_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_detallesUniversidades_universidades1_idx' => array('column' => 'universidad_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'ano_egreso' => 1,
			'ano_decersion' => 1,
			'year' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'universidad_id' => 1
		),
	);

}
