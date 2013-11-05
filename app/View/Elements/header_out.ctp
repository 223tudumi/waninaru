<div id="header_container" class="clearfix">
	<div id="header_logo">
		<?php echo $this->Html->image('common/header_logo.png',array('url'=>array('controller'=>'index','action'=>'index'),'alt'=>'Waninaru','title'=>'Waninaru'));?>
	</div><!-- end header_logo --> 
	<div id="header_navi_container">
		<ul class="clearfix">
			<li><?php echo $this->Html->image('common/header_search_off.png',array('url'=>array('controller'=>'#','action'=>'#'),'alt'=>'企画を検索する','title'=>'企画を検索する'));?></li>
			<li><?php echo $this->Html->image('common/header_activity_off.png',array('url'=>array('controller'=>'#','action'=>'#'),'alt'=>'アクティビティ','title'=>'アクティビティ'));?></li>
			<li><?php echo $this->Html->image('common/header_mypage_off.png',array('url'=>array('controller'=>'#','action'=>'#'),'alt'=>'マイページ','title'=>'マイページ'));?></li>
			<li><?php echo $this->Html->image('common/header_plan_off.png',array('url'=>array('controller'=>'#','action'=>'#'),'alt'=>'企画を立てる','title'=>'企画を立てる'));?></li>
			<li><a href="" id="showoverlay" title="ログイン"><?php echo $this->Html->image('common/header_in_off.png',array('alt'=>'ログイン'));?></a></li>
		</ul>
	</div><!-- end header_navi_container -->
</div><!-- end header_container -->
<div id="modalbox">
	<?php echo $this->Html->image('common/close.png',array('alt'=>'x','width'=>'30','id'=>'close'));?>
	<p><?php echo $this->Html->image('common/login_title.jpg',array('alt'=>'アカウントをお持ちの方はこちら'));?></p>
	<?php echo $this->Form->create('User',array('inputDefaults' => array('label' => false,'div' => false))); ?>
		<ul id="login_form">
			<li>
				<span class="sub_title padding_layout">メールアドレス</span>
				<?php echo $this->Form->input('User.student_number', array('type' => 'text','class'=>'tipped','id'=>'user')); ?>
			</li>
			<li class="clearfix">
				<span class="sub_title pd_5">パスワード</span>
   				<span id="login_left"><?php echo $this->Form->input('User.user_password', array('type' => 'password','name'=>'password','id'=>'password')); ?></span>
   				<span id="login_right">
   				<?php echo $this->Form->submit('../img/common/login_btn.jpg',array('type'=>'submit','width'=>'90','name'=>'mode','alt'=>'ログイン'));?></span>
   			</li>
   		</ul>
    <?php echo $this->Form->end(); ?>
   	<p id="make_area"><?php echo $this->Html->image('common/login_make_off.jpg',array('url'=>array('controller'=>'#','action'=>'#'),'alt'=>'アカウントを作成する','title'=>'アカウントを作成する'));?></p>
</div>