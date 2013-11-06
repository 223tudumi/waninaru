<?php
class LoginsController extends AppController{
	public $helpers = array('Html' , 'Form');
	
	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function index(){
	}
	
	public function admin_index(){
	}
	
	/**
	 * ログイン処理
	 */
	public function admin_login(){
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
	public function admin_logout() {
		$this->autoRender = false;
		$this->redirect($this->Auth->logout());
	}
}
?>