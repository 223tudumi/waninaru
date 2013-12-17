<!-- メインコンテンツはここから編集してください！！！！  -->
<?php echo $this->Html->css(array('my_prof'), null, array('inline'=>false)); ?>

<div id="main_content">
	
	
	<div id="green_text01">
		<p>プロフィール確認<p>
	</div><!-- green text01 -->

<?php if($userSession['id']==$userinfo['User']['id']): ?>

<?php echo $this->Form->create(array('inputDefaults' => array('label' => false,'div' => false,'id'=>false))); ?>
<form method="post" name="form">
	
<div id="tab_content" >


	<div class="row">
		<div id="space">
			<div class="clearfix">
				<p class="name_area">本名　< 必須 ></p>
				<span class="text_box"><?php echo h($request['new_real_name']); ?><?php echo $this->Form->hidden('new_real_name',array('value'=>$request['new_real_name'])); ?></span>
			</div><!-- end clearfix -->
			<span id="expose">
				<?php if($request['radio_b'] == 1): ?>非公開設定に変更します。<?php echo $this->Form->hidden('radio_b',array('value'=>$request['radio_b'])); ?>
				<?php else: ?>公開設定に変更します。<?php echo $this->Form->hidden('radio_b',array('value'=>$request['radio_b'])); ?>
				<?php endif; ?>	
			</span>
		</div><!--end space -->
	</div><!-- end row -->


	<div class="row">
		<div id="space">
			<div class="clearfix">
				<p class="name_area">ユーザ名</p>
				<span class="text_box"><?php echo h($request['new_user_name']); ?><?php echo $this->Form->hidden('new_user_name',array('value'=>$request['new_user_name'])); ?></span>
			</div><!-- end clearfix -->
		</div><!--end space -->
	</div><!-- end row -->

	
	<div class="row">
		<div id="space">	
			<div id="wrap" class="clearfix">		
				<p class="name_area">メールアドレス</p>
				<span class="text_box">
					<?php if($request['use_mail1'] == 1){
						echo("★"); echo($this->Form->hidden('use_mail1',array('value'=>$request['use_mail1'])));
					}else{
						echo("&nbsp&nbsp&nbsp"); echo($this->Form->hidden('use_mail1',array('value'=>$request['use_mail1'])));
					} ?>
					<?php echo h($userinfo['User']['student_number']); ?>@gmail.com</span><br />
				<span class="text_box">
					<?php if($request['use_mail2'] == 2){
						echo("★"); echo($this->Form->hidden('use_mail2',array('value'=>$request['use_mail2'])));
					}else{
						echo("&nbsp&nbsp&nbsp"); echo($this->Form->hidden('use_mail2',array('value'=>$request['use_mail2'])));
					} ?>
					<?php echo h($request['add_mailaddress1']); ?><?php echo $this->Form->hidden('add_mailaddress1',array('value'=>$request['add_mailaddress1'])); ?></span><br /><br />
				<span class="text_box">
					<?php if($request['use_mail3'] == 4){
						echo("★"); echo($this->Form->hidden('use_mail3',array('value'=>$request['use_mail3'])));
					}else{
						echo("&nbsp&nbsp&nbsp"); echo($this->Form->hidden('use_mail3',array('value'=>$request['use_mail3'])));
					} ?>
					<?php echo h($request['add_mailaddress2']); ?><?php echo $this->Form->hidden('add_mailaddress2',array('value'=>$request['add_mailaddress2'])); ?></span>
			</div>

			※　"★"の付いているメールアドレスにメールが送られます。</span>

		</div><!--end space-->
	</div><!-- end row -->	
	
	
	<div class="row">
		<div id="space">
			<div class="clearfix">
				<p id="name_area_textarea">プロフィール文章</p>
				<span class="text_box_"><?php echo h($request['profile_detail']); ?><?php echo $this->Form->hidden('profile_detail',array('value'=>$request['profile_detail'])); ?></span>			
			</div><!-- end clearfix -->
		</div><!--end space -->
	</div><!-- end row -->

	
	<div class="row">
		<div id="space">
			<div class="clearfix">
				<p class="name_area">プログラム</p>
				<span class="text_box"><?php echo h($request['programs']); ?><?php echo $this->Form->hidden('programs',array('value'=>$request['programs'])); ?></span>
			</div><!-- end clearfix -->
		</div><!--end space -->
	</div><!-- end row -->
	
	
	<div class="row">
		<div id="space">
			<div class="clearfix">
				<p class="name_area">プロフィール画像</p>
				<?php echo $this->Html->image("tmps/".$request['profile_img_url'],array('class'=>'img', 'alt' =>$request['profile_img_url'],'width'=>'300','height'=>'300')); ?><?php echo $this->Form->hidden('profile_img_url',array('value'=>$request['profile_img_url'])); ?>
			</div><!-- end clearfix -->
		</div><!--end space -->
	</div><!-- end row -->

	
	<div class="content clearfix">
		<ul>
			<li id="left_image">
				<?php echo $this->Html->image('my_prof/correction_btn.jpg',array('width'=>'200','onClick'=>'history.go(-1)','alt'=>'修正')); ?>
			</li>
			<li id="right">
				<?php echo $this->Form->submit('my_prof/entry_btn.jpg', array('name'=>'mode', 'type'=>'submit', 'width'=>'200')) ?>
				<?php echo $this->Form->hidden('hidden',array('value'=>'complete')); ?>				
			</li>
		</ul>
	</div>	
	
	
</div><!-- end tab_content -->

</form>	


<?php else: ?>
	<?php echo("ログインして再度お試しください"); ?>
<?php endif; ?>

</div><!-- end main_content -->
<!-- 編集ここまで  -->