<?php
App::uses('AdvertsAppController', 'Adverts.Controller');
/**
 * AdvertSlots Controller
 *
 * @property AdvertSlot $AdvertSlot
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AdvertSlotsController extends AdvertsAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * view method
 *
 * @throws ForbiddenException
 * @throws NotFoundException
 * @param string $slug
 * @return array
 */
	public function view($slug = null) {
		$advertSlot = $this->AdvertSlot->findBySlug($slug);
		if (!$advertSlot) {
			throw new NotFoundException();
		}
		if (empty($this->request->params['requested'])) {
			throw new ForbiddenException();
		}
		return $advertSlot;
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AdvertSlot->recursive = 0;
		$this->set('advertSlots', $this->Paginator->paginate());
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AdvertSlot->create();
			if ($this->AdvertSlot->save($this->request->data)) {
				$this->Session->setFlash(__('The advert slot has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advert slot could not be saved. Please, try again.'));
			}
		}
		$advertPositions = $this->AdvertSlot->AdvertPosition->find('list');
		$advertSizes = $this->AdvertSlot->AdvertSize->find('list');
		$this->set(compact('advertPositions', 'advertSizes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->AdvertSlot->exists($id)) {
			throw new NotFoundException(__('Invalid advert slot'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AdvertSlot->save($this->request->data)) {
				$this->Session->setFlash(__('The advert slot has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advert slot could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AdvertSlot.' . $this->AdvertSlot->primaryKey => $id));
			$this->request->data = $this->AdvertSlot->find('first', $options);
		}
		$advertPositions = $this->AdvertSlot->AdvertPosition->find('list');
		$advertSizes = $this->AdvertSlot->AdvertSize->find('list');
		$this->set(compact('advertPositions', 'advertSizes'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->AdvertSlot->id = $id;
		if (!$this->AdvertSlot->exists()) {
			throw new NotFoundException(__('Invalid advert slot'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AdvertSlot->delete()) {
			$this->Session->setFlash(__('The advert slot has been deleted.'));
		} else {
			$this->Session->setFlash(__('The advert slot could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
