<?php
/**
 * TituloFixture
 *
 */
class TituloFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'year' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 4),
		'tipo' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4),
		'recursosHumano_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'carrera_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_titulos_recursosHumanos_idx' => array('column' => 'recursosHumano_id', 'unique' => 0),
			'fk_titulos_carreras1_idx' => array('column' => 'carrera_id', 'unique' => 0)
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
			'year' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'tipo' => 1,
			'recursosHumano_id' => 1,
			'carrera_id' => 1
		),
	);

}
