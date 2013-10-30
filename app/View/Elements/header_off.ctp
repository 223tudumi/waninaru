<div id="header_container" class="clearfix">
	<div id="header_logo">
		<?php echo $this->Html->image('common/header_logo.png',array('url'=>array('controller'=>'#','action'=>'#'),'alt'=>'Waninaru','title'=>'Waninaru'));?>
	</div><!-- end header_logo --> 
	<div id="header_navi_container">
		<ul class="clearfix">
			<li><?php echo $this->Html->image('common/header_search_off.png',array('url'=>array('controller'=>'#','action'=>'#'),'alt'=>'企画を検索する','title'=>'企画を検索する'));?></li>
			<li><?php echo $this->Html->image('common/header_activity_off.png',array('url'=>array('controller'=>'#','action'=>'#'),'alt'=>'アクティビティ','title'=>'アクティビティ'));?></li>
			<li><?php echo $this->Html->image('common/header_mypage_off.png',array('url'=>array('controller'=>'#','action'=>'#'),'alt'=>'マイページ','title'=>'マイページ'));?></li>
			<li><?php echo $this->Html->image('common/header_plan_off.png',array('url'=>array('controller'=>'#','action'=>'#'),'alt'=>'企画を立てる','title'=>'企画を立てる'));?></li>
			<li><?php echo $this->Html->image('common/header_in_off.png',array('url'=>array('controller'=>'#','action'=>'#'),'alt'=>'ログアウト','title'=>'ログアウト'));?></li>
		</ul>
	</div><!-- end header_navi_container -->
</div><!-- end header_container -->