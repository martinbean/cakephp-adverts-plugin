<?php 
App::uses('Adverts.AdvertSize', 'Model');

class AdvertSchema extends CakeSchema {

	public function before($event = array()) {
		$db = ConnectionManager::getDataSource($this->connection);
		$db->cacheSources = false;
		return true;
	}

	public function after($event = array()) {
		// Create common advert sizes
		if (isset($event['create'])) {
			switch ($event['create']) {
				case 'advert_sizes':
					App::uses('ClassRegistry', 'Utility');
					$advertSize = ClassRegistry::init('Adverts.AdvertSize');
					$sizes = array(
						'Medium Rectangle' => '300x250',
						'Large Rectangle' => '336x280',
						'Leaderboard' => '728x90',
						'Wide Skyscraper' => '160x600',
						'Mobile Banner' => '320x50',
						'Half Banner' => '234x60',
						'Large Mobile Banner' => '320x100',
						'Banner' => '468x60',
						'Large Leaderboard' => '970x90',
						'Skyscaper' => '120x600',
						'Vertical Banner' => '120x240',
						'Large Skyscaper' => '300x600',
						'Square' => '250x250',
						'Small Square' => '200x200',
						'Small Rectangle' => '180x150',
						'Button' => '125x125',
					);
					foreach ($sizes as $name => $dimensions) {
						list($width, $height) = explode('x', $dimensions);
						$advertSize->create();
						$advertSize->set(array(
							'name' => $name,
							'width' => $width,
							'height' => $height
						));
						$advertSize->save();
					}
					break;
			}
		}
	}

	public $advert_positions = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'slug' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'slug' => array('column' => 'slug', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $advert_sizes = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'width' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'height' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $advert_slots = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'slug' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'capacity' => array('type' => 'integer', 'null' => false, 'default' => null),
		'unlimited' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'advert_position_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'advert_size_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	public $adverts = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'url' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'clicks' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'impressions' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'required_impressions' => array('type' => 'integer', 'null' => true, 'default' => null),
		'start_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'end_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'advert_slot_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

}
