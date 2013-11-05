<?php
class RulesController extends AppController{
	var $uses = array();
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->fields = array(
			'username' => 'student_number',
			'password' => 'user_password'
		);
	}
	
	function index(){
	}
}
?>