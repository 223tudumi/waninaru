<?php
class IdeasController extends AppController{
	var $uses = array('Idea','User');
//	var $paginate = array(
//			'limit' => 20,
//			'order' => array(
//					'Project.id' => 'desc'
//			),
//	);
	public $helpers = array('Html' , 'Form');
	
	public function index(){
		$this->set('idealists',$this->Idea->find('all',array(
			'order'=>'created desc',
		)));
		//アイデア投稿
		if($this->request->isPOST()){
			
			$this->Idea->user_id = $userSession['id'];
			$this->request->data['Idea']['user_id'] = $this->Idea->user_id;
			
			if($this->Idea->save($this->request->data)){
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('失敗したよ!!!');
			}
		}
	}
	
	public function detail($id = null){
		$this->set('ideain',$this->Idea->read());
		$this->set('idcoms',$this->Icomment->find('all',array(
			'order'=>'Icomment.id',
			'conditions'=>array('Icomment.idea_id'=>$this->Idea->id)
		)));
	}
	
	public function postform(){
		$this->set('idcoms',$this->Icomment->read());
	}
}
?>