<?php
App::uses('AppModel', 'Model');
/**
 * Titulo Model
 *
 * @property RecursosHumano $RecursosHumano
 * @property Carrera $Carrera
 */
class Titulo extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'RecursosHumano' => array(
			'className' => 'RecursosHumano',
			'foreignKey' => 'recursosHumano_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Carrera' => array(
			'className' => 'Carrera',
			'foreignKey' => 'carrera_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
