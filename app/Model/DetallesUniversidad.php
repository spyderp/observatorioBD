<?php
App::uses('AppModel', 'Model');
/**
 * DetallesUniversidad Model
 *
 * @property Universidad $Universidad
 */
class DetallesUniversidad extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'detallesUniversidades';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ano_egreso' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ano_decersion' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Universidad' => array(
			'className' => 'Universidad',
			'foreignKey' => 'universidad_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
