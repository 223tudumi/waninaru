<?php
class UsersController extends AppController{
	public $helpers = array('Html' , 'Form');
	
	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function admin_index(){
		$this->set('users' , $this->User->find('all'));
	}
	
	public function admin_userDetail($id = null){
		$this->User->id = $id;
		$this->set('user',$this->User->read());
	}
	
	public function admin_userRegist(){
		if($this->request->isPost()){
			$this->data['User']['user_password'] = AuthComponent::password($this->data['User']['user_password']);
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
		if($this->request->isPost()){
			$this->User->delete($this->request->data($this->User->id));
			$this->redirect(array('action'=>'admin_index'));
		}
	}
	
	public function admin_userUpdate($id){
		$this->User->id = $id;
		if($this->request->isGet()){
			$this->request->data=$this->User->read();
		}else{
			if($this->User->save($this->request->data)){
				$this->redirect(array('action'=>'admin_index'));
			} else {
				$this->Session->setFlash('失敗したよ!!!');
			}
		}
	}
	
	/** 
	 * ログイン処理
	 */
	public function login() {
		if ($this->request->isPost()) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
			}
		}
	}
	
	/**
	 * ログアウト処理
	 */
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
}

?>