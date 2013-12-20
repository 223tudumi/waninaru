<?php
class IdeasBookmarksController extends AppController{
	public $helpers = array('Html' , 'Form');
	var $uses = array('IdeasBookmark','Idea');
	
	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function index(){
		$userSession = $this->Auth->user();
		$this->IdeasBookmark->recursive=3;
		$this->paginate = array(
			'conditions' => array('IdeasBookmark.user_id'=>$userSession['id']),
			'limit' => 9,
			'order' => array(
					'Idea.created' => 'asc'
			)
		);
		$this->set('date',$this->paginate());
	}
	
	public function regist($idea_id=null){
		$this->autoRender = false;
		$userSession = $this->Auth->user();
		$this->request->data['IdeasBookmark']['idea_id'] = $idea_id;
		$this->request->data['IdeasBookmark']['user_id'] = $userSession['id'];
		
		if(!$this->IdeasBookmark->save($this->request->data)){
			$this->Session->setFlash('失敗したよ!!!');
		}
		//TODO ここのリダイレクト先がアイデアの場合どこが良いか解らないので江本氏の判断にまかせます
		$this->redirect(array('controller'=>'ideas','action'=>'detail',$idea_id));
		
	}
	
	public function delete($project_id=null){
		$this->autoRender = false;
		$this->set('idea',$this->Idea->read());
		//projectbookmarksのユーザーIDを引っ張ってきてログイン中のIDと比較、一致ならprojectscontroller参照
		$this->request->data['IdeasBookmark']['user_id'] = $user_id;
		$this->Idea->user_id = $id;//ここおかしいよー　ブクマしてる人のidもってこい
		if($user_id == $id){
			$this->Idea->delete($this->request->data($this->Idea->id),true);
			$this->redirect(array('controller'=>'ideasBookmarks','action'=>'index'));//'/detail/'.$idea['Idea']['id']));
		}
		
	}
}