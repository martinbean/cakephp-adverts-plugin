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

/**
 * Called before each save operation, after validation.
 * Return a non-true result to halt the save.
 *
 * @param array $options Options passed from Model::save().
 * @return boolean
 */
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias][$this->displayField])) {
			$this->data[$this->alias]['slug'] = $this->createSlug($this->data[$this->alias][$this->displayField]);
		}
		return true;
	}

}
