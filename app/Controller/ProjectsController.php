<?php
class ProjectsController extends AppController{
	var $uses = array('Project','User','ProjectsUser','Search','ProjectsComment');
	var $paginate = array(
			'limit' => 20,
			'order' => array(
					'Project.id' => 'desc'
			),
	);
	public $helpers = array('Html' , 'Form');
	
	public function index(){
		$today = date("y/m/d Ah:i");
		$this->set('news',$this->Project->find('all' , array(
			'order'=>'Project.created',
			'conditions'=>array('Project.created >=' => $today),
			'limit'=>21,
				)
			)
		);
	}
	
	public function detail($id = null){
		$this->Project->id = $id;
		$this->set('kikaku',$this->Project->read());
		$this->set('react',$this->Comment->read());
		//タグを配列で取得
		//以下コメント機能
		$commentsno = count($react['Comment']);
		if($_POST['submit']){
				//書き込まれた内容をDBに保存
				array(
					[Comment]=> array(
						[id] => '$commentno + 1',
						[project_id] => '$kikaku[Project][id]',
						[user_id] => '$kikaku[ProjectUser][user_name]',
						[comment_text] => '',
					)
				);
			}
		}
	
	public function search(){
		if(empty($this->request->data)){
			$today = date("y/m/d Ah:i");
			$this->set('searches',$this->Project->find('all' , array('order'=>'Project.created','conditions'=>array('Project.created >=' => $today),'limit'=>21,)));
		}elseif(/**タグ検索かけられていたら **/aa){
			$this->set('searches',$this->Project->find('all' , array(
				'order' => 'Project.created',
				'conditions' => array(
					'Project.created' => 'between yyyy-mm-dd AND yyyy-mm-dd',//日付範囲指定
					'$_POST<=' => '[tags]',//タグテーブルから取得？　また連結させなきゃか？	
				)
			)));
		}else{
			$this->set('searches',$this->Project->find('all' , array(
					'order' => 'Project.created',
					'conditions' => array(
							'Project.created' => 'between yyyy-mm-dd AND yyyy-mm-dd',//日付範囲してい
							'$_POST<=' => '[tags],[]',//etc...
							))));
		}
		//ソートはif文の中に組み込む？
		
		//MODEL内で連結は出来ているので、残り人数の変数を用意しよう。
		$max = array('PROJECTS.MAXNUM');//上限人数
		$joiner = array(count('PROJECTS.USERS'));//参加人数
		foreach($rest as $re){
			$re = $max - $joiner;
		}//$restに配列として残り人数を格納したつもり。
		
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
}
?>