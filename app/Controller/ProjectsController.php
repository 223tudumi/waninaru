<?php
class ProjectsController extends AppController{
	var $uses = array('Project','User','ProjectsUser');
	public $helpers = array('Html' , 'Form');
	
	public function admin_index(){
		$this->set('projects' , $this->Project->find('all'));
	}
	
	public function admin_projectDetail($id = null){
		$this->Project->id = $id;
		$this->set('project',$this->Project->read());
	}
	
	public function admin_projectRegist($user_id = null){
		$this->request->data['ProjectsUser']['user_id'] = $user_id;
		if($this->request->isPost()){
			$tmpName = $this->request->data['Project']['image_file_name']['tmp_name'];
			$this->request->data['Project']['image_file_name'] = "temp";
			if($this->Project->save($this->data)){
				$imageName = $this->Project->id. '-' . date('YmdHis') . '.jpg';
				$fileName = APP.'webroot/img/projects/'.$imageName;
				move_uploaded_file($tmpName, $fileName);
				$this->request->data['Project']['image_file_name'] = $imageName;
				$this->Project->save($this->data);
				
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