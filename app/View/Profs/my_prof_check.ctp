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
				<span class="text_box"><?php ?></span>
			</div><!-- end clearfix -->
			<span id="expose"><?php ?>非公開設定になっています。</span>
		</div><!--end space -->
	</div><!-- end row -->


	<div class="row">
		<div id="space">
			<div class="clearfix">
				<p class="name_area">ユーザ名</p>
				<span class="text_box"><?php ?></span>
			</div><!-- end clearfix -->
		</div><!--end space -->
	</div><!-- end row -->

	
	<div class="row">
		<div id="space">	
			<div id="wrap" class="clearfix">		
				<p class="name_area">メールアドレス</p>
				<span class="text_box"><?php ?>ne230025@gmail.com</span>
				<span class="text_box"></span>
			</div>

			<span><form id="number"><?php ?>ne230025@senshu-u.jp</form><br />
			※追加したメールアドレスにメールが送られます。</span>

		</div><!--end space-->
	</div><!-- end row -->	
	
	
	<div class="row">
		<div id="space">
			<div class="clearfix">
				<p id="name_area_textarea">プロフィール文章</p>
				<span class="text_box_"<?php ?>></span>			
			</div><!-- end clearfix -->
		</div><!--end space -->
	</div><!-- end row -->

	
	<div class="row">
		<div id="space">
			<div class="clearfix">
				<p class="name_area">プログラム</p>
				<span class="text_box"><?php ?></span>
			</div><!-- end clearfix -->
		</div><!--end space -->
	</div><!-- end row -->
	
	
	<div class="row">
		<div id="space">
			<div class="clearfix">
				<p class="name_area">プロフィール画像</p>
				<input class="img" type="file"><?php ?></input>
			</div><!-- end clearfix -->
		</div><!--end space -->
	</div><!-- end row -->

	
	<div class="content clearfix">
		<ul>
			<li id="left_image">
				<?php echo $this->Form->submit('my_prof/correction_btn.jpg', array('name'=>'return', 'type'=>'submit', 'width'=>'200')) ?>
				<p><?php echo $this->Html->image('my_prof/correction_btn.jpg',array('name'=>'return', 'url'=>array('controller'=>'profs','action'=>'my_prof',$userinfo['User']['id']), 'alt'=>'戻る', 'width'=> '200'));?></p>
			</li>
			<li id="right">
				<?php echo $this->Form->submit('my_prof/entry_btn.jpg', array('name'=>'submit', 'type'=>'submit', 'width'=>'200')) ?>
				<p><?php echo $this->Html->image('my_prof/edit_prof_btn.jpg',array('name'=>'submit', 'url'=>array('controller'=>'profs','action'=>'my_prof_check',$userinfo['User']['id']), 'alt'=>'確認', 'width'=> '200'));?></p>
				
			</li>
		</ul>
	</div>	
	
	
</div><!-- end tab_content -->

</form>	
<?php echo $this->Form->end() ?>

<?php else: ?>
	<?php echo("ログインして再度お試しください"); ?>
<?php endif; ?>

</div><!-- end main_content -->
<!-- 編集ここまで  -->