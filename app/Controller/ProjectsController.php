<?php
class ProjectsController extends AppController{
	var $uses = array('Project','Producer','User');
	public $helpers = array('Html' , 'Form');
	
	public function admin_index(){
		$this->set('projects' , $this->Project->find('all',array('recursive' => 2)));
		
	}
	
	public function admin_projectRegist($user_id = null){
		$this->request->data['Producer']['user_id'] = $user_id;
		$this->User->id = $user_id;
		$this->set('user',$this->User->read());
		if($this->request->isPost()){
			$this->request->data['Producer']['user_id'] = $user_id;
			if($this->Project->saveAll($this->request->data)){
				$this->Session->setFlash('成功したよ!!!');
			} else {
				$this->Session->setFlash('失敗したよ!!!');
			}
		}
	}
}
?>