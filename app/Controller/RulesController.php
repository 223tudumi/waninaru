<?php
class RulesController extends AppController{
	var $uses = array();
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
	
	function index(){
	}
	
	/**
	 * ログアウト処理
	 */
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
}
?>