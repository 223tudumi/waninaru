<?php
class ProjectsController extends AppController{
	var $uses = array('Project','User','ProjectsUser','Comment','Tag','JoinersProject','Joiner');
	public $helpers = array('Html' , 'Form');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index','search','detail');
	}
	
	public function index(){
		$this->render('search');
	}
	
	public function detail($id = null){
		$this->Project->id = $id;
		$this->Comment->project_id=$id;
		$this->set('kikaku',$this->Project->read());
		$this->set('comments',$this->Comment->find('all', array(
				'order'=>'Comment.id')));
		//$this->set('tags',$this->Tag->read());
		$this->Comment->user_id = $userSession['id'];
		$this->set('commentnum',count($this->comments['Comment']));
		
		//以下コメント機能
		if($this->request->isPOST()){
			$this->request->data['Comment']['user_id'] = $this->Comment->user_id;
			$this->request->data['Comment']['project_id'] = $this->Comment->project_id;
			if($this->Comment->save($this->request->data)){
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('失敗したよ!!!');
			}
		}//保存完了したらリダイレクトするのだから、コントローラはこれでおk。あとはビューを調整しなさい。
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
	
	public function join($project_id = null){
		$userSession = $this->Auth->user();
		if(0==count($this->Joiner->find(all,array('conditions'=>array('user_id'=>$userSession['id']))))){
			$this->request->data['Joiner']['user_id'] = $userSession['id'];
			$this->Joiner->save($this->request->data);
		}
		if(0==count($this->JoinersProject->find(all,array('conditions'=>array('joiner_id'=>$userSession['id'],'project_id'=>$project_id))))){
			$this->request->data['JoinersProject']['project_id'] = $project_id;
			$userjoin = $this->Joiner->find(first,array('conditions'=>array('user_id'=>$userSession['id'])));
			$this->request->data['JoinersProject']['joiner_id'] = $userjoin['Joiner']['id'];
			if($this->JoinersProject->save($this->request->data)){
			}else{
				$this->Session->setFlash('失敗したよ!!!');
			}
		}
		$this->redirect(array('action'=>'detail',$project_id));
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
	
	public function admin_projectJoinIn($user_id = null){
		$this->request->data['JoinersProject']['joiner_id'] = $user_id;
		if($this->request->isPost()){
			if($this->JoinersProject->save($this->request->data)){
				$this->redirect(array('action'=>'admin_index'));
			}else{
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