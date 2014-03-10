<?php

App::uses('AdvertsAppModel', 'Adverts.Model');

/**
 * AdvertPosition Model
 *
 * @property AdvertSlot $AdvertSlot
 */
class AdvertPosition extends AdvertsAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'slug' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'AdvertSlot' => array(
			'className' => 'AdvertSlot',
			'foreignKey' => 'advert_position_id',
			'dependent' => false,
		)
	);

}
