<?php
class ProjectsController extends AppController{
	var $uses = array('Project','User','ProjectsUser');
	public $helpers = array('Html' , 'Form');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index','search');
	}
	
	public function index(){
		$this->render('search');
	}
	
	public function search(){
	}
	
	public function regist(){
		/**
		$this->request->data['ProjectsUser']['user_id'] = $this->Auth->user(['id']);
		if(empty($this->request->data)){
		}else{
			if($this->request->data['Project']['hidden']=='confirm'){
				$this->render("regist_confirm");
			}
			else if($this->request->data['Project']['hidden']=='complete'){
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
					$this->render("regist_complete");
				} else {
					$this->Session->setFlash('失敗したよ!!!');
				}
			}
		}
		*/
	}
	
	public function admin_index(){
		$this->set('projects' , $this->paginate('Project'));
	}
	
	public function admin_projectDelete($id = null){
		$this->Project->id = $id;
		$this->set('project',$this->Project->read());
		if($this->request->isPost()){
			$this->Project->delete($this->request->data($this->Project->id),true);
			$this->redirect(array('action'=>'admin_index'));
		}
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
	
	/**
	 * ログアウト処理
	 */
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
}
?>