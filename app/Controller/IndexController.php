<?php
class IndexController extends AppController{
	var $uses = array('Project','User','ProjectsUser');
	public $helpers = array('Html' , 'Form');
	public $components = Array(
			'Session',
			'Auth' => Array(
					'loginRedirect' => Array('controller'  => 'index', 'action' => 'index'),
					'logoutRedirect' => Array('controller' => 'index', 'action' => 'index'),
					'authenticate' => Array('Form' => Array('fields' => Array('username' => 'student_number','password'=>'user_password')))
			)
	);
	
	public function index(){
		$today = date("y/m/d Ah:i");
		$this->set('news',$this->Project->find('all' , array(
				'order'=>'Project.created',
				'conditions'=>array('Project.created >=' => $today),
				'limit'=>21,
		)
		)
		);
	}
	
	/**
	 * ログアウト処理
	 */
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
}
?>