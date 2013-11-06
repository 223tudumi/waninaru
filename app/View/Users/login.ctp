<div id="error_container">
	<div id="error_text_container">
		<h2><?php echo $this->Html->image('common/error_title.jpg',array('alt'=>'error!!'));?></h2>
		<h3>パスワードをもう一度入力してください。</h3>
		<p class="pd_10">学籍番号とパスワードの組み合わせが間違っているようです。<br />もう一度入力してください。</p>
		<p class="pd_30">パスワードを忘れてしまった場合は、<?php echo $this->Html->link('お問い合わせページ' , array('controller'=>'inquiries' , 'action'=>'index') ) ?>より管理者にご連絡ください。</p>
	</div><!-- end error_text_container -->
	<div id="login_again_container">
		<div id="login_again_inner">
    		<p><?php echo $this->Html->image('common/login_title.jpg',array('alt'=>'アカウントをお持ちの方はこちら'));?></p>
   			<?php echo $this->Form->create('User',array('inputDefaults' => array('label' => false,'div' => false),'type'=>'POST','action'=>'login')); ?>
   				<ul class="login_form">
   					<li class="sub_title">学籍番号（メールアドレス）</li>
   					<li class="clearfix">
   						<span class="login_left"><?php echo $this->Form->input('student_number', array('type' => 'text','class'=>'user tipped','name'=>'user','title'=>'000000')); ?></span>
   						<span class="login_right">@senshu-u.jp</span>
   					</li>
   					<li class="sub_title">パスワード</li>
   					<li class="clearfix">
   						<span class="login_left"><?php echo $this->Form->input('user_password', array('type' => 'password','class'=>'password')); ?></span>
   						<span class="login_right"><?php echo $this->Form->submit('../img/common/login_btn.jpg',array('type'=>'submit','width'=>'90','name'=>'mode','alt'=>'ログイン'));?></span>
   					</li>
   				</ul>
   			<?php echo $this->Form->end(); ?>
   			<p id="make_area"><?php echo $this->Html->image('common/login_make_off.jpg',array('url'=>array('controller'=>'user_temps','action'=>'account_entry'),'alt'=>'アカウントを作成する','title'=>'アカウントを作成する'));?></p>
   		</div><!-- end login_again_inner -->
	</div><!-- end login_again_container -->

</div><!-- end error_container -->