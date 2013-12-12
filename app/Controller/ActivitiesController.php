<?php
class ActivitiesController extends AppController{
	public $helpers = array('Html' , 'Form');
	var $uses = array('Comment','Joiner','JoinersProject','ProjectsUser');
	
	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function index(){
		$actives = array();
		$temps = array();
		$userSession = $this->Auth->user();
		
		//自分が企画を立案した
		$date = $this->ProjectsUser->find(all,array('conditions'=>array('ProjectsUser.user_id'=>$userSession['id'])));
		foreach($date as $project){
			$temps = array(
				'url'=>'/projects/detail/',
				'id'=>$project['Project']['id'],
				'message'=>'あなたは '.$project['Project']['project_name'].' を企画しました。',
				'image'=>$project['Project']['image_file_name'],
				'created'=>$project['Project']['created']
			);
			array_push($actives,$temps);
		}
		
		//自分が企画に参加した
		$num = $this->Joiner->find(first,array('conditions'=>array('Joiner.id'=>$userSession['id'])));
		$date = $this->JoinersProject->find(all,array('conditions'=>array('JoinersProject.joiner_id'=>$num['Joiner']['id'])));
		foreach($date as $project){
			$temps = array(
					'url'=>'/projects/detail/',
					'id'=>$project['Project']['id'],
					'message'=>'あなたは '.$project['Project']['project_name'].' に参加しました。',
					'image'=>$project['Project']['image_file_name'],
					'created'=>$project['Project']['created']
			);
			array_push($actives,$temps);
		}
		
		//自分が参加した企画が開始した
		$num = $this->Joiner->find(first,array('conditions'=>array('Joiner.id'=>$userSession['id'])));
		$date = $this->JoinersProject->find(all,array('conditions'=>array('JoinersProject.joiner_id'=>$num['Joiner']['id'])));
		foreach($date as $project){
			if($project['Project']['active_date']['year']==date(Y) ||
			$project['Project']['active_date']['month']==date(M) ||
			$project['Project']['active_date']['day']==date(D) ){
				$temps = array(
						'url'=>'/projects/detail/',
						'id'=>$project['Project']['id'],
						'message'=>'あなたが参加した '.$project['Project']['project_name'].' が本日開催されます。',
						'image'=>$project['Project']['image_file_name'],
						'created'=>$project['Project']['created']
				);
				array_push($actives,$temps);
			}
		}
		
		//自分が企画にコメントした
		$date = $this->Comment->find(all,array('conditions'=>array('Comment.user_id'=>$userSession['id'])));
		foreach($date as $project){
			$temps = array(
					'url'=>'/projects/detail/',
					'id'=>$project['Project']['id'],
					'message'=>'あなたは '.$project['Project']['project_name'].' にコメントしました。',
					'image'=>$project['Project']['image_file_name'],
					'created'=>$project['Project']['created']
			);
			array_push($actives,$temps);
		}
		
		//ソート
		foreach ($actives as $key => $row){
			$created[$key] = $row['created'];
		}
		array_multisort($created,SORT_DESC,$actives);
		
		//試験出力
		$this->set('activities',$actives);
	}
}
?>