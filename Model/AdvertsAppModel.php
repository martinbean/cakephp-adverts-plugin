<?php

App::uses('AppModel', 'Model');
App::uses('Inflector', 'Utility');

class AdvertsAppModel extends AppModel {

	public function createSlug($string) {
		return Inflector::slug(strtolower($string), '-');
	}
}
