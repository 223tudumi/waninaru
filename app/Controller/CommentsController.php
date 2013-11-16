<?php
class CommentsController extends AppController{
	public $helpers = array('Html' , 'Form');
	
	public function index(){
		$this->autoRender = false;
	}
	
	public function delete($id = null,$project_id=null){
		$this->autoRender = false;
		$this->Comment->id = $id;
		$this->Comment->delete();
		$this->redirect('/projects/detail/'.$project_id);
	}
}
?>