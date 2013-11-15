<?php
class CommentsController extends AppController{
	public $helpers = array('Html' , 'Form');
	
	public function index(){
		$this->autoRender = false;
	}
	
	public function delete($id = null){
		$this->Comment->id = $id;
		if($this->Comment->delete()){
			$this->redirect($this->referer());
		}else{
			$this->Session->setFlash('失敗したよ!!!');
		}
	}
}
?>