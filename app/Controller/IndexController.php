<?php
class IndexController extends AppController{
	var $uses = array('Project','User','ProjectsUser');
	public $helpers = array('Html' , 'Form');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
	
	public function index(){
		$this->set('news',$this->Project->find('all' , array(
				'order'=>'Project.created desc',
				'conditions'=>array('Project.recrouit_date >= curdate()'),
				'limit'=>21,
		)
		)
		);
	}
	
	/**
	 * ログアウト処理
	 */
	public function logout() {
		$this->autoRender = false;
		$this->redirect($this->Auth->logout());
	}
}
?>