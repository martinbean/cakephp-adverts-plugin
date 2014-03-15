<?php
App::uses('AdvertsAppController', 'Adverts.Controller');
App::uses('File', 'Utility');

/**
 * Adverts Controller
 *
 * @property Advert $Advert
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AdvertsController extends AdvertsAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Advert->exists($id)) {
			throw new NotFoundException();
		}
		$this->Advert->recursive = -1;
		$this->Advert->id = $id;
		$this->Advert->incrementImpressions();
		return $this->redirect(Router::url('/files/adverts/' . $this->Advert->field('image_filename')), 302);
	}

/**
 * Proxy function for advert clicks.
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
	 */
	public function click($id) {
		if (!$this->Advert->exists($id)) {
			throw new NotFoundException();
		}
		$this->Advert->id = $id;
		$this->Advert->incrementClicks();
		return $this->redirect($this->Advert->field('url'), 307);
	}

/**
 * Records an impression for an advert.
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
	 */
	public function impression($id) {
		if (!$this->Advert->exists($id)) {
			throw new NotFoundException();
		}
		$this->Advert->id = $id;
		$this->Advert->incrementImpressions();
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Advert->recursive = 0;
		$this->set('adverts', $this->Paginator->paginate());
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Advert->create();
			if ($this->Advert->save($this->request->data)) {
				$this->Session->setFlash(__('The advert has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advert could not be saved. Please, try again.'));
			}
		}
		$advertSlots = $this->Advert->AdvertSlot->find('list');
		$this->set(compact('advertSlots'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Advert->exists($id)) {
			throw new NotFoundException(__('Invalid advert'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Advert->save($this->request->data)) {
				$this->Session->setFlash(__('The advert has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advert could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Advert.' . $this->Advert->primaryKey => $id));
			$this->request->data = $this->Advert->find('first', $options);
		}
		$advertSlots = $this->Advert->AdvertSlot->find('list');
		$this->set(compact('advertSlots'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Advert->id = $id;
		if (!$this->Advert->exists()) {
			throw new NotFoundException(__('Invalid advert'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Advert->delete()) {
			$this->Session->setFlash(__('The advert has been deleted.'));
		} else {
			$this->Session->setFlash(__('The advert could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
