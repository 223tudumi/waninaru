<!-- メインコンテンツはここから編集してください！！！！  -->
<?php echo $this->Html->css(array('my_prof'), null, array('inline'=>false)); ?>

<div id="main_content">
	
	
	<div id="green_text01">
		<p>プロフィール編集<p>
	</div><!-- green text01 -->

	
<?php if($userSession['id']==$userinfo['User']['id']): ?>

<?php echo $this->Form->create(array('inputDefaults' => array('label' => false,'div' => false,'id'=>false))); ?>
<form method="post" name="form">


<div id="tab_content" >


	<div class="row">
		<div id="space">
			<div class="wrap clearfix">
				<p class="name_area">本名　< 必須 ></p>
					
				<div class="text_box">
					<span>
						<input type="text" size="48px" name="new_real_name" value="<?php echo($userinfo['User']['real_name']); ?>" />
					</span>
				</div>	
			</div><!-- end clearfix -->

			<div id="radio_content" class="clearfix">
				<div id="radio_content1" class="clearfix">
					<input type="radio" class="radio1" name="radio_b" value="1" <?php if($userprofile['Prof']['real_name_private']==1){echo("checked");} ?> /><span class="radio1">非公開</span>
				</div>
				<div id="radio_content2" class="clearfix">
					<input type="radio" class="radio2" name="radio_b" value="0" <?php if($userprofile['Prof']['real_name_private']==0 || $userprofile['Prof']['real_name_private']==null){echo("checked");} ?> /><span class="radio2">公開</span>
				</div>
			</div>		
			<span><br /><br />非公開設定にしていても企画投稿時には本名が公開されます。<br />
			非公開設定が適用されるのは、企画に参加した場合とコメントした場合です。</span>	
		</div><!--end space -->
	</div><!-- end row -->

	
	<div class="row">
		<div id="space">
			<div class="wrap clearfix">
				<p class="name_area">ユーザ名</p>

				<div class="text_box">
					<span>	
						<?php if($userinfo['User']['user_name']!=null): ?>
							<input type="text" size="48px" name="new_user_name" value="<?php echo($userinfo['User']['user_name']); ?>" />
						<?php else: ?>
							<input type="text" class="tipped" title="ユーザ名の追加" size="48px" name="new_user_name"/>
						<?php endif; ?>
					</span>
				</div>
			</div><!-- end clearfix -->	
		</div><!--end space -->
	</div><!-- end row -->

	
	<div class="row">
		<div id="space">	
			<div class="wrap clearfix">
				<p class="name_area">メールアドレス</p>
				
				<div id="mail_wrap_content" class="clearfix">
					<div class="content_ clearfix">
						<span class="check_padding">
							<input type="checkbox" name="use_mail1" value="1" 
							<?php if($userprofile['Prof']['use_address']%2==1){echo("checked"); /*index参照*/}?> />
						</span>
						<span class="maill_padding">	
							<p id="block">ne<?php echo($userinfo['User']['student_number']); ?>@senshu-u.jp</p>
						</span>
					</div><!--end content clearfix-->
				
					<div class="content_ clearfix">
						<span class="check_padding">
							<input type="checkbox" name="use_mail2" value="2" 
							<?php if($userprofile['Prof']['use_address']>1 && 42%$userprofile['Prof']['use_address']==0){echo("checked"); /*index参照*/}?> />
						</span>
						<span class="maill_padding">
							<?php if($userprofile['Prof']['addmail1']!=null): ?>
								<input type="text" size="48px" name="add_mailaddress1" value="<?php echo($userprofile['Prof']['addmail1']); ?>" />
							<?php else: ?>
								<input type="text" class="tipped" title="メールアドレスの追加" name="add_mailaddress1" />
							<?php endif; ?>
						</span>
				
					</div><!--end content clearfix-->
				
					<div class="content_ clearfix">
						<span class="check_padding">
							<input type="checkbox" name="use_mail3" value="4" 
							<?php if(4<=$userprofile['Prof']['use_address'] && $userprofile['Prof']['use_address']<=7){echo("checked"); /*index参照*/}?> />
						</span>
						<span class="maill_padding">
							<?php if($userprofile['Prof']['addmail2']!=null): ?>
								<input type="text" size="48px" name="add_mailaddress2" value="<?php echo($userprofile['Prof']['addmail2']); ?>" />
							<?php else: ?>
								<input type="text" class="tipped" title="メールアドレスの追加" name="add_mailaddress2" />
							<?php endif; ?>
						</span>
				
						</div><!--end content clearfix-->	
					</div><!--end mail_wrap_content clearfix -->
				</div><!--end wrap clarfix-->			
				<span><br />※使用するメールアドレスにチェックを入れて下さい。チェックが入っていなかった場合専修大学gmailに送られます。</span>
			</div><!--end space-->
		</div><!-- end row -->	
	
	
		<div class="row">
			<div id="space">
				<div class="clearfix">
					<p id="name_area_textarea">プロフィール文章</p>
						<textarea cols="100" rows="10" name="profile_detail" ><?php if($userprofile['Prof']['prof_detail']!=null){ print($userprofile['Prof']['prof_detail']); }?></textarea>	
				</div><!-- end clearfix -->
			</div><!--end space -->
		</div><!-- end row -->
	
	
		<div class="row">
			<div id="space">
				<div class="clearfix">
					<p class="name_area">プログラム</p>
		
					<select class="text_box" name="programs">
						<option value="not_program" <?php if($userprofile['Prof']['program']==null || $userprofile['Prof']['program']=="not_program"){echo("selected");} ?>>未所属</option>
						<option value="CD" <?php if($userprofile['Prof']['program']=="CD"){echo("selected");} ?>>CD(コンテンツデザイン)</option>
						<option value="NS" <?php if($userprofile['Prof']['program']=="NS"){echo("selected");} ?>>NS(ネットワークシステム)</option>
						<option value="US" <?php if($userprofile['Prof']['program']=="US"){echo("selected");} ?>>US(ユビキタスシステム)</option>
						<option value="MP" <?php if($userprofile['Prof']['program']=="MP"){echo("selected");} ?>>MP(メディアプロデュース)</option>
						<option value="SI" <?php if($userprofile['Prof']['program']=="SI"){echo("selected");} ?>>SI(社会情報)</option>
						<option value="IS" <?php if($userprofile['Prof']['program']=="IS"){echo("selected");} ?>>IS(情報数理)</option>
						<option value="IB" <?php if($userprofile['Prof']['program']=="IB"){echo("selected");} ?>>IB(ITビジネス)</option>
						<option value="MI" <?php if($userprofile['Prof']['program']=="MI"){echo("selected");} ?>>MI(経営情報分析)</option>
					</select>	
				</div><!-- end clearfix -->
			</div><!--end space -->
		</div><!-- end row -->
	
	
		<div class="row">
			<div id="space">
				<div class="clearfix">
					<p class="name_area">プロフィール画像</p>
						
					<div id="wrap" class="clearfix">
						<input class="img" type="file" name="profile_img_url" />
						<?php echo $this->Form->input('User.profile_img_url', array('type' => 'file','id'=>'image','class'=>'img', 'enctype'=>'multipart/form-data')); ?>
					</div>
				</div><!-- end clearfix -->
			</div><!--end space-->
		</div><!-- end row -->	

		
</div><!-- end tab_content -->


			<div class="content clearfix">
				<ul>
					<li id="right_btn">
						<?php echo $this->Form->submit('my_prof/btn.jpg', array('type'=>'submit', 'name'=>'入力確認','width'=>'200')) ?>
						<?php echo $this->Form->hidden('hidden',array('value'=>'confirm')); ?>
					</li>
				</ul>
			</div>

			
</form>	
<?php echo $this->Form->end() ?>


<?php else: ?>
	<?php echo("ログインして再度お試しください"); ?>
<?php endif; ?>


</div><!-- end main_content -->


<!-- 編集ここまで  -->