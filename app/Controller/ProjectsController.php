<?php
class ProjectsController extends AppController{
	var $uses = array('Project','User','ProjectsUser');
	public $helpers = array('Html' , 'Form');
	
	public function admin_index(){
		$this->set('projects' , $this->Project->find('all'));
	}
	
	public function admin_projectRegist($user_id = null){
		$this->request->data['ProjectsUser']['user_id'] = $user_id;
		if($this->request->isPost()){
			if($this->Project->saveALL($this->data)){
				$this->request->data['ProjectsUser']['project_id'] = $this->Project->id;
				$this->ProjectsUser->save($this->data);
				$this->redirect(array('action'=>'admin_index'));
			} else {
				$this->Session->setFlash('失敗したよ!!!');
			}
		}
	}
}
?>