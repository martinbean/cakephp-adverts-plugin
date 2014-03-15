<?php
App::uses('ModelBehavior', 'Model');

class FileUploadBehavior extends ModelBehavior {

/**
 * Property to temporarily hold uploaded file name
 * between beforeDelete() and afterDelete() methods.
 *
 * @var string
 */
	protected $_filename;

/**
 * Setup this behavior with the specified configuration settings.
 *
 * @param Model $Model Model using this behavior
 * @param array $settings Configuration settings for $model
 * @return void
 */
	public function setup(Model $Model, $settings = array()) {
		if (!isset($this->settings[$Model->alias])) {
			$this->settings[$Model->alias] = array(
				'allowedExtensions' => array('gif', 'jpg', 'jpeg', 'png'),
				'field' => 'image_filename',
				'uploadDir' => WWW_ROOT . 'files' . DS . 'adverts' . DS,
			);
		}
		$this->settings[$Model->alias] = array_merge(
			$this->settings[$Model->alias],
			(array)$settings
		);
	}

/**
 * Called during validation operations, before validation.
 *
 * @param array $options Options passed from Model::save().
 * @return boolean
 */
	public function beforeValidate(Model $Model, $options = array()) {
		$fieldName = $this->fieldName($Model);
		$fieldData = $this->fieldData($Model);
		$allowedExtensions = $this->allowedExtensions($Model);

		// A file is required upon create
		if ($fieldData['error'] == UPLOAD_ERR_NO_FILE) {
			if ($Model->exists()) {
				// If updating and no file has been uploaded, unset key in data
				unset($Model->data[$Model->alias][$fieldName]);
			} else {
				$Model->validationErrors[$fieldName] = array(
					__('Please supply a file for upload')
				);
				return false;
			}
		}

		// Validate uploaded image if we have one
		if (is_array($fieldData) && !empty($fieldData['name'])) {
			$Model->validator()->add($fieldName, 'extension', array(
				'rule' => array('extension', $allowedExtensions),
				'message' => __('Please supply a valid file (must be one of ' . implode(', ', $allowedExtensions) . ')')
			));
			$Model->validator()->add($fieldName, 'uploadError', array(
				'rule' => 'uploadError',
				'message' => __('Something went wrong with the upload')
			));
		}

		return true;
	}

/**
 * Called before each save operation, after validation.
 * Return a non-true result to halt the save.
 *
 * @param array $options Options passed from Model::save().
 * @return boolean
 */
	public function beforeSave(Model $Model, $options = array()) {
		$fieldName = $this->fieldName($Model);
		$fieldData = $this->fieldData($Model);

		// If field is array, a file needs processing
		if ($fieldData !== false && is_array($fieldData)) {
			try {
				$this->moveUploadedFile($Model);
			} catch (Exception $e) {
				$Model->validationErrors[$fieldName] = array($e->getMessage());
				return false;
			}
		}
		return true;
	}

/**
 * Called before every deletion operation.
 *
 * @param boolean $cascade If true records that depend on this record will also be deleted
 * @return boolean
 */
	public function beforeDelete(Model $Model, $cascade = true) {
		// Get name of associated file
		return true;
	}

/**
 * Called after every deletion operation.
 *
 * @return void
 */
	public function afterDelete(Model $Model) {
		$file = new File($this->uploadDir . $this->_filename);
		$file->delete();
	}

/**
 * Allowed extensions.
 *
 * @param Model $Model
 * @return array
 */
	public function allowedExtensions(Model $Model) {
		return $this->settings[$Model->alias]['allowedExtensions'];
	}

/**
 * The name of the field holding the uploaded file.
 *
 * @param Model $Model
 * @return string
 */
	public function fieldName(Model $Model) {
		return $this->settings[$Model->alias]['field'];
	}

/**
 * The actual data of the field holding the uploaded file.
 *
 * @param Model $Model
 * @return array
 */
	public function fieldData(Model $Model) {
		$fieldName = $this->fieldName($Model);
		return isset($Model->data[$Model->alias][$fieldName]) ? $Model->data[$Model->alias][$fieldName] : false;
	}

/**
 * Path of upload directory, relative from webroot.
 *
 * @param Model $Model
 * @return string
 */
	public function uploadDir(Model $Model) {
		return $this->settings[$Model->alias]['uploadDir'];
	}

/**
 * Attempt to move uploaded file.
 *
 * @param Model $Model
 * @return void
 * @throws Exception
 */
	public function moveUploadedFile(Model $Model) {
		$fieldName = $this->fieldName($Model);
		$fieldData = $this->fieldData($Model);
		$uploadDir = $this->uploadDir($Model);

		if (!is_writable($uploadDir)) {
			throw new Exception(__('Upload directory is not writable'));
		}

		$source = $fieldData['tmp_name'];
		$filename = $this->generateFilename($Model);
		$destination = $uploadDir . $filename;

		if (!move_uploaded_file($source, $destination)) {
			throw new Exception(__('Error uploading file'));
		}

		$Model->data[$Model->alias][$fieldName] = $filename;

		if ($Model->hasField('size')) {
			$Model->data[$Model->alias]['size'] = $fieldData['size'];
		}
		if ($Model->hasField('type')) {
			$Model->data[$Model->alias]['type'] = $fieldData['type'];
		}
	}

/**
 * Generate a name for the uploaded file.
 *
 * @param Model $Model
 * @return string
 */
	public function generateFilename($Model) {
		if (method_exists($Model, 'generateFilename')) {
			return $Model->generateFilename($Model);
		} else {
			$fieldData = $this->fieldData($Model);
			$file = new File($fieldData['name']);
			$filename = $file->safe() . $file->ext();
			return strtolower($filename);
		}
	}
}