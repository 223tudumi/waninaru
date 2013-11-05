<?php
class RulesController extends AppController{
	var $uses = array();
	public $components = Array(
			'Session',
			'Auth' => Array(
					'loginRedirect' => Array('controller'  => 'index', 'action' => 'index'),
					'logoutRedirect' => Array('controller' => 'index', 'action' => 'index'),
					'authenticate' => Array('Form' => Array('fields' => Array('username' => 'student_number','password'=>'user_password')))
			)
	);
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->fields = array(
			'username' => 'student_number',
			'password' => 'user_password'
		);
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