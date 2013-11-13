<?php
class ActibitiesController extends AppController{
	public $helpers = array('Html' , 'Form');
	
	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function index(){
		
	}
	
	/**
	 * ログアウト処理
	 */
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
}
?>