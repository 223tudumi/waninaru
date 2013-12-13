<?php
class ActivitiesController extends AppController{
	public $helpers = array('Html' , 'Form');
	var $uses = array('Comment','Joiner','JoinersProject','ProjectsBookmark','ProjectsUser');
	
	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function index(){
		$actives = array();
		$temps = array();
		
		/**
		* 使用する定数
		* $userSession : ログインしているユーザ情報
		* $today : アクセス時の日付情報
		 */
		$userSession = $this->Auth->user();
		$today = Date("Y-m-d");
		
		//自分が企画を立案した
		$date = $this->ProjectsUser->find(all,array('conditions'=>array('ProjectsUser.user_id'=>$userSession['id'])));
		foreach($date as $project){
			$temps = array(
				'url'=>'/projects/detail/',
				'id'=>$project['Project']['id'],
				'message'=>'あなたは '.$project['Project']['project_name'].' を企画しました。',
				'image'=>$project['Project']['image_file_name'],
				'image_url'=>'projects/',
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
					'image_url'=>'projects/',
					'created'=>$project['JoinersProject']['created']
			);
			array_push($actives,$temps);
		}
		
		//自分が企画をブックマークした
		$date = $this->ProjectsBookmark->find(all,array('conditions'=>array('ProjectsBookmark.user_id'=>$userSession['id'])));
		foreach($date as $project){
			$temps = array(
					'url'=>'/projects/detail/',
					'id'=>$project['Project']['id'],
					'message'=>'あなたは '.$project['Project']['project_name'].' をブックマークしました。',
					'image'=>$project['Project']['image_file_name'],
					'image_url'=>'projects/',
					'created'=>$project['ProjectsBookmark']['created']
			);
			array_push($actives,$temps);
		}
		
		//自分が参加した企画が開始した
		$num = $this->Joiner->find(first,array('conditions'=>array('Joiner.id'=>$userSession['id'])));
		$date = $this->JoinersProject->find(all,array('conditions'=>array('JoinersProject.joiner_id'=>$num['Joiner']['id'])));
		foreach($date as $project){
			$orderDate = Date("Y-m-d",strtotime($project['Project']['active_date']));
			if($today == $orderDate){
				$temps = array(
						'url'=>'/projects/detail/',
						'id'=>$project['Project']['id'],
						'message'=>'あなたが参加した '.$project['Project']['project_name'].' が本日開催されます。',
						'image'=>$project['Project']['image_file_name'],
						'image_url'=>'projects/',
						'created'=>$project['Project']['active_date']
				);
				array_push($actives,$temps);
			}
		}
		
		//自分がブックマークした企画が開始した
		$date = $this->ProjectsBookmark->find(all,array('conditions'=>array('ProjectsBookmark.user_id'=>$userSession['id'])));
		foreach($date as $project){
			$orderDate = Date("Y-m-d",strtotime($project['Project']['active_date']));
			if($today == $orderDate){
				$temps = array(
						'url'=>'/projects/detail/',
						'id'=>$project['Project']['id'],
						'message'=>'あなたがブックマークした '.$project['Project']['project_name'].' が本日開催されます。',
						'image'=>$project['Project']['image_file_name'],
						'image_url'=>'projects/',
						'created'=>$project['Project']['active_date']
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
					'image_url'=>'projects/',
					'created'=>$project['Comment']['created']
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