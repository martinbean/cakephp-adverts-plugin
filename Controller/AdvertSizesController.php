<?php
App::uses('AdvertsAppController', 'Adverts.Controller');
/**
 * AdvertSizes Controller
 *
 * @property AdvertSize $AdvertSize
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AdvertSizesController extends AdvertsAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AdvertSize->recursive = 0;
		$this->set('advertSizes', $this->Paginator->paginate());
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AdvertSize->create();
			if ($this->AdvertSize->save($this->request->data)) {
				$this->Session->setFlash(__('The advert size has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advert size could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->AdvertSize->exists($id)) {
			throw new NotFoundException(__('Invalid advert size'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AdvertSize->save($this->request->data)) {
				$this->Session->setFlash(__('The advert size has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advert size could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AdvertSize.' . $this->AdvertSize->primaryKey => $id));
			$this->request->data = $this->AdvertSize->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->AdvertSize->id = $id;
		if (!$this->AdvertSize->exists()) {
			throw new NotFoundException(__('Invalid advert size'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AdvertSize->delete()) {
			$this->Session->setFlash(__('The advert size has been deleted.'));
		} else {
			$this->Session->setFlash(__('The advert size could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
