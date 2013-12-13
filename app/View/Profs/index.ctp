<!-- メインコンテンツはここから編集してください！！！！  -->
<?php echo $this->Html->css(array('my_top'), null, array('inline'=>false)); ?>

<div id="main_content">

	<ul class="menu">
		<li><a href="./my_join.html">参加中</a></li>
		<li><a href="#">ブックマーク</a>
			<ul>
				<li><a href="#" title="ブックマークアイディア">アイディア</a></li>
				<li><a href="#" title="ブックマーク企画">　　　企画</a></li>
				<li><a href="#" title="ブックマークユーザ">　　ユーザ</a></li>
			</ul>
		</li>
		<li><a href="#">投稿</a>
			<ul>
				<li><a href="#" title="投稿アイディア">アイディア</a></li>
				<li><a href="#" title="投稿企画">　　　企画</a></li>
			</ul>
		</li>
	</ul><!--end menu-->





	<div id="green_text01">
		<p>マイプロフィール<p>
		</div><!-- green text01 -->


<div class="wrap clearfix">
		<div id="left">
			<div id="img_wrap">
				<?php echo $this->Html->image('projects/'.$profile['Prof']['profimg_url'],array('width'=>'200','height'=>'200'));?>
			</div>
		</div><!--end right-->


<div id="text_content" class="clearfix">
		<div id="text_left">
			<div class="wrap_content">
				<div class="common"><p class="boder_in_text">学籍番号</p></div>
				<p class="boder_under_text">NE<?php echo h($userinfo['User']['student_number']); ?></p>
			</div><!-- end wrap_content -->


			<div class="wrap_content">
				<div class="common"><p class="boder_in_text">ユーザ名</p></div>
				<p class="boder_under_text">
				<?php if($userinfo['User']['user_name'] != null){
						echo h($userinfo['User']['user_name']); 
					}else{
						echo ("未設定");
					} ?></p>				
			</div><!-- end wrap_content -->
			
		</div><!-- end text_left -->
		
		
		<div id="text_right">
			
			<div class="wrap_content">	
				<div class="common"><p class="boder_in_text">名　前
					<?php if($userSession['id']==$userinfo['User']['id']){
						if($profile['Prof']['real_name_private'] == 0){
							echo("&nbsp&nbsp&nbsp※公開中");
						}else{
							echo("&nbsp&nbsp&nbsp※非公開");
						}
					}?></p></div>
				<p class="boder_under_text">
					<?php if($userSession['id']==$userinfo['User']['id']){
						echo h($userinfo['User']['real_name']); 
					}else if($userSession!= null) {
						if($profile['Prof']['real_name_private'] == 0){
							echo h($userinfo['User']['real_name']);
						}else {
							echo("非公開");
						}
					} ?></p>
			</div><!-- end wrap_content -->

			<div class="wrap_content">	
				<div class="common"><p class="boder_in_text">プログラム</p></div>
				<p class="boder_under">
					<?php if($profile['Prof']['program'] != null){
						if($profile['Prof']['program'] == "not_program"){
							echo h("未選択");
						}else if($profile['Prof']['program'] == "CD"){
 							echo h("CD(コンテンツデザイン)");
 						}else if($profile['Prof']['program'] == "NS"){
 							echo h("NS(ネットワークシステム)");
 						}else if($profile['Prof']['program'] == "US"){
 							echo h("US(ユビキタスシステム)");
 						}else if($profile['Prof']['program'] == "MP"){
 							echo h("MP(メディアプロデュース)");
 						}else if($profile['Prof']['program'] == "SI"){
 							echo h("SI(社会情報)");
 						}else if($profile['Prof']['program'] == "IS"){
 							echo h("IS(情報数理)");
 						}else if($profile['Prof']['program'] == "IB"){
 							echo h("IB(ITビジネス)");
 						}else if($profile['Prof']['program'] == "MI"){
 							echo h("MI(経営情報分析)");
 						}
					}else{
						echo ("未設定");
					}?></p>
			</div><!-- end wrap_content -->

		</div><!-- end text_right -->
		
		
		
	</div><!-- end text_content clearfix-->
	
</div>


			<div class="wrap">
			<?php if($userSession['id']==$userinfo['User']['id']): ?>
				<div class="common"><p class="boder_in_text">メールアドレス</p>
				</div>
				
				<div id="mail" class="clearfix">
				<div id="mail_left">
					<span class="mail"><p class="mail">ne<?php echo h($userinfo['User']['student_number']); ?>@senshu-u.jp</p></span>
					<span class="mail"><p class="mail"><?php echo h($profile['Prof']['addmail1']); ?></p></span>
					<span class="mail"><p class="mail"><?php echo h($profile['Prof']['addmail2']); ?></p></span>
				</div>
				
				<div id="mail_right">
					<p class="mail_text">
						<?php if($profile['Prof']['use_address'] == null || $profile['Prof']['use_address'] % 2 == 1){ 
							echo("★使用メールアドレス");	//neアドレスを使っていた場合(Prof.use_addressが1,3,5,7であった場合)					
						} else {
							echo("&nbsp; ");
						} ?>
					</p>
					<p class="mail_text">
						<?php if($profile['Prof']['use_address'] > 1 && 42 % $profile['Prof']['use_address'] == 0){
							echo("★使用メールアドレス");	//1つ目の追加アドレスを使っていた場合(Prof.use_addressが2,3,6,7であった場合)
						} else {
							echo("&nbsp; ");
						} ?>
					</p>
					<p class="mail_text">
						<?php if(4 <= $profile['Prof']['use_address'] && $profile['Prof']['use_address'] <= 7){
							echo("★使用メールアドレス");	//2つ目の追加アドレスを使っていた場合(Prof.use_addressが4,5,6,7であった場合)
						} else {
							echo("&nbsp; ");
						} ?>
					</p>
				</div>
				</div>
			<?php endif; ?>	
			</div><!--end wrap -->


<div id="last_wrap">
	<div id="last_wrap_text">
		<p id="last">
			<?php echo h($profile['Prof']['prof_detail']); ?>
		</p>
	</div>
</div><!--end last_wrap -->
			
		<?php if($userSession['id']==$userinfo['User']['id']): ?>
			<div class="wrap clearfix">
				<ul>
					<li id="left_image">						
						<p><?php echo $this->Html->image('my_prof/edit_pass_btn.jpg',array('url'=>array('controller'=>'profs','action'=>'pass',$userinfo['User']['id']), 'alt'=>'パスワードの編集', 'width'=> '250'));?></p>
					</li>
					<li id="right">
						<p><?php echo $this->Html->image('my_prof/edit_prof_btn.jpg',array('url'=>array('controller'=>'profs','action'=>'my_prof',$userinfo['User']['id']), 'alt'=>'プロフィールの変更', 'width'=> '250'));?></p>
					</li>
				</ul>
			</div>
		<?php endif; ?>


</div><!-- main_content -->

<!-- 編集ここまで  -->
