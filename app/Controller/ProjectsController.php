<?php
class ProjectsController extends AppController{
	var $uses = array('Project','User','ProjectsUser','Comment','Tag','JoinersProject','Joiner','Mail');
	public $helpers = array('Html' , 'Form' , 'Paginator');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index','search','detail');
	}
	
	public function index(){
		$this->render('search');
	}
	
	public function detail($id = null){
		$userSession = $this->Auth->user();
		$this->Project->id = $id;
		$this->Comment->project_id=$id;
		$this->Comment->recursive = 2;
		$this->set('kikaku',$this->Project->read());
		$this->set('comments',$this->Comment->find('all', array(
				'order'=>'Comment.id',
				'conditions'=>array('Comment.project_id'=>$this->Project->id))));
		//$this->set('tags',$this->Tag->read());
		$this->set('commentnum',$this->Comment->find('count',array('conditions'=>array('Comment.project_id'=>$this->Project->id))));
		
		//以下コメント機能
		if($this->request->isPOST()){
			$this->Comment->user_id = $userSession['id'];
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
		$this->set('tagstr',$this->Tag->read());
		$this->set('projectnum',$this->Project->find('count'));
		
		if($this->request->isPOST()){
			if($this->Searchsystem->save($this->request->data)){
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('失敗したよ!!!');
			}
		}
		if(!empty($_REQUEST['search_text'])){
			$today = date("y/m/d Ah:i");
			$start = date("y/m/d");
			$end = null;
			if(!empty($_REQUEST['start_date'])){
				$start = $_REQUEST['start_date'];
			}
			if(!empty($_REQUEST['end_date'])){
				$end = $_REQUEST['end_date'];
			}
			$date = $this->Project->find('all',array(
					'order' =>'Project.created desc',
					'conditions'=>array(
							//"active_date BETWEEN ? AND ?"=>array("$start","$end")
							'Project.active_date >=' => $today,
					)));
			$this->set('searches',$date);
		}else{
			$today = date("y/m/d Ah:i");
			$date = $this->Project->find('all',array(
					'order' =>'Project.created desc',
					'conditions'=>array(
							'Project.active_date >=' => $today,
					)));
			$this->set('news',$date);
		}
	}
	
	public function regist(){
		$userSession = $this->Auth->user();
		$this->request->data['ProjectsUser']['user_id'] = $userSession['id'];
		if(empty($this->request->data)){
		}else{
			if($this->request->data['Project']['hidden']=='confirm'){
				$this->request->data['Project']['detail_text'] = htmlspecialchars($this->request->data['Project']['detail_text']);
				$this->request->data['Project']['detail_text'] = nl2br($this->request->data['Project']['detail_text']);
				
				$tmpName = $this->request->data['Project']['image_file_name']['tmp_name'];
				$imageName = 'tmp-' . date('YmdHis') . '.jpg';
				$fileName = APP.'webroot/img/tmps/'.$imageName;
				move_uploaded_file($tmpName, $fileName);
				$this->request->data['Project']['image_file_name'] = $imageName;
				
				$this->set('project',$this->request->data['Project']);
				$this->render("regist_confirm");
			}
			else if($this->request->data['Project']['hidden']=='complete'){
				if($this->Project->save($this->request->data)){
					rename(APP.'webroot/img/tmps/'.$this->request->data['Project']['image_file_name'], APP.'webroot/img/projects/'.$this->Project->id.$this->request->data['Project']['image_file_name']);
					$this->request->data['Project']['image_file_name'] = $this->Project->id.$this->request->data['Project']['image_file_name'];
					$this->Project->save($this->request->data);
					
					$this->request->data['ProjectsUser']['project_id'] = $this->Project->id;
					$this->request->data['ProjectsUser']['user_id'] = $userSession['id'];
					if($this->ProjectsUser->save($this->request->data)){
						$this->set('project',$this->Project->read());
						$this->render("regist_complete");
					}
				} else {
					$this->Session->setFlash('失敗したよ!!!');
				}
				
			}
		}
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
		}else{
		}
		$this->redirect(array('action'=>'detail',$project_id));
	}
	
	public function out($project_id = null){
		$userSession = $this->Auth->user();
		
		$this->Project->id = $project_id;
		$kikaku = $this->Project->read();
		$joiner = $this->Joiner->find(first,array('conditions'=>array('user_id'=>$userSession['id'])));
		foreach($kikaku['projectJoiner'] as $kkk){
			if($kkk['JoinersProject']['joiner_id']==$joiner['Joiner']['id']){
				$this->JoinersProject->id = $kkk['JoinersProject']['id'];
				$this->JoinersProject->delete();
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
		$this->Project->recursive = 2;
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
	
	public function admin_projectUpdate($project_id = null){
		$this->Project->id = $project_id;
		if($this->request->isGet()){
			$this->request->data=$this->Project->read();
			$project = $this->Project->read();
			foreach($project['projectUser'] as $projecter){
				$this->request->data['ProjectsUser']['user_id'] =$projecter['id'];
			}
		}else{
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