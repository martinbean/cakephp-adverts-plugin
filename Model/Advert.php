<?php

App::uses('AdvertsAppModel', 'Adverts.Model');

/**
 * Advert Model
 *
 * @property AdvertSlot $AdvertSlot
 */
class Advert extends AdvertsAppModel {

/**
 * List of behaviors to load when the model object is initialized.
 *
 * @var array
 */
	public $actsAs = array(
		'Adverts.FileUpload'
	);

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'url' => array(
			'url' => array(
				'rule' => array('url'),
			),
		),
		'clicks' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'impressions' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'start_date' => array(
			'date' => array(
				'rule' => array('date'),
			),
		),
		'end_date' => array(
			'date' => array(
				'rule' => array('date'),
			),
		),
		'active' => array(
			'boolean' => array(
				'rule' => array('boolean'),
			),
		),
		'advert_slot_id' => array(
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
		'AdvertSlot' => array(
			'className' => 'AdvertSlot',
			'foreignKey' => 'advert_slot_id',
		)
	);

/**
 * Increment clicks count for advert.
 *
 * @param int $id
 * @return void
 */
	public function incrementClicks($id = null) {
		if (is_null($id)) {
			$id = $this->id;
		}
		$this->updateAll(
			array('Advert.clicks' => 'Advert.clicks + 1'),
			array('Advert.id' => $id)
		);
	}

/**
 * Increment impressions count for advert.
 *
 * @param int $id
 * @return void
 */
	public function incrementImpressions($id = null) {
		if (is_null($id)) {
			$id = $this->id;
		}
		$this->updateAll(
			array('Advert.impressions' => 'Advert.impressions + 1'),
			array('Advert.id' => $id)
		);
	}
}
