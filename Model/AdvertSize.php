<?php

App::uses('AdvertsAppModel', 'Adverts.Model');

/**
 * AdvertSize Model
 *
 * @property AdvertSlot $AdvertSlot
 */
class AdvertSize extends AdvertsAppModel {

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
		'width' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'height' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
			'foreignKey' => 'advert_size_id',
			'dependent' => false,
		)
	);

}
