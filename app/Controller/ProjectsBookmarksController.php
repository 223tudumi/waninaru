<?php
class ProjectsBookmarksController extends AppController{
	public $helpers = array('Html' , 'Form');
	var $uses = array('ProjectsBookmark','Project');
	
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
/*		$this->autoRender = false;
		$this->set('project',$this->Project->read());
		//projectbookmarksのユーザーIDを引っ張ってきてログイン中のIDと比較、一致ならprojectscontroller参照
		$this->request->data['ProjectsBookmark']['user_id'] = $user_id;
		$this->Project->user_id = $id;
		if($user_id == $id){
			$this->Project->delete($this->request->data($this->Project->id),true);
			$this->redirect(array('action'=>'/detail/'.$project['Project']['id']));
		}*/
		$this->autoRender = false;
		
		$userSession = $this->Auth->user();
		$this->set('project',$this->Project->read());
		//projectbookmarksのユーザーIDを引っ張ってきてログイン中のIDと比較、一致ならprojectscontroller参照
		$this->request->data['ProjectsBookmark']['project_id'] = $project_id;
		$this->request->data['ProjectsBookmark']['user_id'] = $user_id;
		
		$num = $this->ProjectsBookmark->find('first',array('conditions'=>array('project_id'=>$project_id,'ProjectsBookmark.user_id'=>$userSession['id'])));
		$this->ProjectsBookmark->project_id = $num['ProjectsBookmark']['id'];
		$this->request->data['ProjectsBookmark']['id'] = $num['ProjectsBookmark']['id'];
		$this->ProjectsBookmark->id = $num['ProjectsBookmark']['id'];
		
		
		$this->ProjectsBookmark->delete($this->request->data($this->ProjectsBookmark->id),true);
		$this->redirect(array('controller'=>'projects','action'=>'detail',$project_id));
		
	}
}