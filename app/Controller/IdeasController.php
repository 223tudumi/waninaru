<?php
class IdeasController extends AppController{
	var $uses = array('Idea','User','Icomment');
//	var $paginate = array(
//			'limit' => 20,
//			'order' => array(
//					'Project.id' => 'desc'
//			),
//	);
	public $helpers = array('Html' , 'Form' , 'Paginator');
	
	public function index(){
		$userSession = $this->Auth->user();
		
		$this->paginate = array(
				'limit' => 9,
				'order'=>'Idea.created desc',
		);
		$this->set('idealists',$this->paginate());
		
		
		
		
		//アイデア投稿
		if($this->request->isPOST()){
			
			$this->User->user_id = $userSession['id'];
			$this->request->data['Idea']['user_id'] = $userSession['id'];
			
			if($this->Idea->save($this->request->data)){
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('失敗したよ!!!');
			}
		}
	}
	
	public function detail($id = null){
		$this->set('ideain',$this->Idea->find('all',array(
			'conditions' => array('Idea.id'=>$this->Idea->id,
		))));
		$this->set('idcoms',$this->Icomment->find('all',array(
			'order'=>'Icomment.id',
			'conditions'=>array('Icomment.idea_id'=>$this->Idea->id)
		)));
		//コメント投稿
		if($this->request->isPOST()){
			$this->User->user_id = $userSession['id'];
			$this->request->data['Idea']['user_id'] = $userSession['id'];
			$this->request->data['idea']['id'] = $this->Idea->id;
			
			if($this->Icomment->save($this->request->data)){
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('失敗したよ!!!');
			}
		}
	}
	
	public function postform(){
		$this->set('idealists',$this->Icomment->read());
	}
}
?>