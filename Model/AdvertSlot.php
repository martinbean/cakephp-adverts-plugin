<?php

App::uses('AdvertsAppModel', 'Adverts.Model');

/**
 * AdvertSlot Model
 *
 * @property AdvertPosition $AdvertPosition
 * @property AdvertSize $AdvertSize
 * @property Advert $Advert
 */
class AdvertSlot extends AdvertsAppModel {

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
		'capacity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'unlimited' => array(
			'boolean' => array(
				'rule' => array('boolean'),
			),
		),
		'advert_position_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'advert_size_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'AdvertPosition' => array(
			'className' => 'AdvertPosition',
			'foreignKey' => 'advert_position_id',
		),
		'AdvertSize' => array(
			'className' => 'AdvertSize',
			'foreignKey' => 'advert_size_id',
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Advert' => array(
			'className' => 'Advert',
			'foreignKey' => 'advert_slot_id',
			'dependent' => false,
			'conditions' => array(
				'Advert.active' => true,
				'Advert.start_date >= CURDATE()',
				'Advert.end_date <= CURDATE()',
			),
			'order' => array(
				'Advert.impressions' => 'ASC'
			),
			'limit' => '',
		)
	);

}
