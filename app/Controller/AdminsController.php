<?php

class AdminsController extends AppController{
	var $uses = array('Login');
	public $helpers = array('Html' , 'Form');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('admin_index','admin_regist');
	}
	
	public function admin_index(){
		$this->set('admins' , $this->Admin->find('all'));
	}
	
	public function admin_regist(){
		if($this->request->isPost()){
			if($this->Admin->save($this->request->data)){
				$this->redirect(array('action'=>'admin_index'));
			} else {
				$this->Session->setFlash('失敗したよ!!!');
			}
		}
	}
}

?>