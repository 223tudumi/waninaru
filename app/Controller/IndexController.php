<?php
class IndexController extends AppController{
	var $uses = array('Project','User','ProjectsUser');
	public $helpers = array('Html' , 'Form');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
	
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