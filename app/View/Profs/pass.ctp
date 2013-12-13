<!-- メインコンテンツはここから編集してください！！！！  -->
<?php echo $this->Html->css(array('pass'), null, array('inline'=>false)); ?>


	<div id="main_content">
		
		<div id="green_text01">
			<p>Waninaruアカウントのパスワードを変更</p>
		</div><!-- end green_text01 -->
		
		<?php if($userSession['id']==$userinfo['User']['id']): ?>
		<div class="wrap">
			<div id="content">
				<p id="text_large">-------  パスワード変更時の注意 -------</p><!-- end text_large -->
				<p id="text_small">パスワードを変更する時には、まず既存のパスワードを入力し、新しいパスワードを2度入力して下さい。<br />
					パスワードは、英字・数字を含む６文字以上16文字以上で入力して下さい。</p><!-- end text_small -->
			</div>
			
			<?php echo $this->Form->create(array('inputDefaults' => array('label' => false,'div' => false,'id'=>false))); ?>
			<form method="post" name="form">　
			<div class="clearfix">
				<div id="right">
					<p class="pass">古いパスワード</p>
						<span id="block">
							<input type="password" name="oldpassword"/>
						</span>
						
					<p class="pass">新しいパスワード</p>
						<span id="block">
							<input type="password" name="newpassword1"/>
						</span>
						
					<p class="pass">パスワードの確認</p>
						<span id="block">
							<input type="password" name="newpassword2"/>				
						</span>
					
					<?php echo $this->Form->hidden('oldpassword');
						  echo $this->Form->hidden('newpassword1'); 
					      echo $this->Form->hidden('newpassword2'); ?>
					<div class="submit">
						<?php echo $this->Form->submit('my_prof/submit_btn.jpg', array('type'=>'submit', 'name'=>'送信','width'=>'200')) ?>
					</div>
										
				</div><!-- end right -->
			</div><!-- end clearfix -->
			
			</form>	
			<?php echo $this->Form->end() ?>
			
	</div><!-- end wrap -->
	<?php else: ?>
		<?php echo("ログインして再度お試しください"); ?>
	<?php endif; ?>
	
	
	

	
	
	
	
</div><!-- end main_content -->


<!-- 編集ここまで  -->