<?php
App::uses('AdvertsAppController', 'Adverts.Controller');
/**
 * AdvertPositions Controller
 *
 * @property AdvertPosition $AdvertPosition
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AdvertPositionsController extends AdvertsAppController {

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
		$this->AdvertPosition->recursive = 0;
		$this->set('advertPositions', $this->Paginator->paginate());
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AdvertPosition->create();
			if ($this->AdvertPosition->save($this->request->data)) {
				$this->Session->setFlash(__('The advert position has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advert position could not be saved. Please, try again.'));
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
		if (!$this->AdvertPosition->exists($id)) {
			throw new NotFoundException(__('Invalid advert position'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AdvertPosition->save($this->request->data)) {
				$this->Session->setFlash(__('The advert position has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advert position could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AdvertPosition.' . $this->AdvertPosition->primaryKey => $id));
			$this->request->data = $this->AdvertPosition->find('first', $options);
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
		$this->AdvertPosition->id = $id;
		if (!$this->AdvertPosition->exists()) {
			throw new NotFoundException(__('Invalid advert position'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AdvertPosition->delete()) {
			$this->Session->setFlash(__('The advert position has been deleted.'));
		} else {
			$this->Session->setFlash(__('The advert position could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
