<?php
class ProjectsController extends AppController{
	public $helpers = array('Html' , 'Form');
	var $uses = array('Projects','Users','Joins');
	
	public function admin_index(){
		$this->set('projects' , $this->Project->find('all'));
	}
	
	public function admin_projectRegist(){
		
	}
}
?>