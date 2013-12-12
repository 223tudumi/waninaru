<?php
class ProjectsBookmarksController extends AppController{
	public $helpers = array('Html' , 'Form');
	var $uses = array('ProjectsBookmark');
	
	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function index(){
		$this->autoRender = false;
	}
	
	public function regist($project_id=null){
		$this->autoRender = false;
		$userSession = $this->Auth->user();
		$this->request->data['ProjectsBookmark']['project_id'] = $project_id;
		$this->request->data['ProjectsBookmark']['user_id'] = $userSession['id'];
		
		if(!$this->ProjectsBookmark->save($this->request->data)){
			$this->Session->setFlash('失敗したよ!!!');
		}
		$this->redirect(array('controller'=>'projects','action'=>'detail',$project_id));
		
	}
	
	public function delete($project_id=null){
		$this->autoRender = false;
	
	}
}