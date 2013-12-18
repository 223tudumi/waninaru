<?php
class ProjectsBookmarksController extends AppController{
	public $helpers = array('Html' , 'Form');
	var $uses = array('ProjectsBookmark');
	
	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function index(){
		$userSession = $this->Auth->user();
		$this->ProjectsBookmark->recursive=3;
		$this->paginate = array(
			'conditions' => array('user_id'=>$userSession['id']),
			'limit' => 9,
			'order' => array(
					'Project.created' => 'asc'
			)
		);
		$this->set('date',$this->paginate());
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
		//projectbookmarksのユーザーIDを引っ張ってきてログイン中のIDと比較、一致ならprojectscontroller参照
	}
}