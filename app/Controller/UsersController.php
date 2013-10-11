<?php

class UsersController extends AppController{
	public $helpers = array('Html' , 'Form');
	
	public function admin_index(){
		$this->set('users' , $this->User->find('all'));
	}
	
	public function admin_userDetail($id = null){
		$this->User->id = $id;
		$this->set('user',$this->User->read());
	}
	
	public function admin_userRegist(){
		if($this->request->isPost()){
			if($this->User->save($this->request->data)){
				$this->redirect(array('action'=>'admin_index'));
			} else {
				$this->Session->setFlash('失敗したよ!!!');
			}
		}
	}
	
	public function admin_userDelete($id){
		$this->User->id = $id;
		$this->set('user',$this->User->read());
		if($this->request->isGet()){
			if($this->User->delete($this->request->data($this->User->id))){
				$this->redirect(array('action'=>'admin_index'));
			} else {
				$this->Session->setFlash('失敗したよ!!!');
			}
		}
	}
}

?>