<?php
class AboutsController extends AppController{
	var $uses = array();
	public $components = Array(
			'Session',
			'Auth' => Array(
					'loginRedirect' => Array('controller'  => 'index', 'action' => 'index'),
					'logoutRedirect' => Array('controller' => 'index', 'action' => 'index'),
					'authenticate' => Array('Form' => Array('fields' => Array('username' => 'student_number','password'=>'user_password')))
			)
	);
	
	function index(){
		$this->layout = 'static';
	}
	
	/**
	 * ログアウト処理
	 */
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
}
?>