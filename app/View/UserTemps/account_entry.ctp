<!-- メインコンテンツはここから編集してください！！！！  -->

<div id="account_container">
<?php $this->Form->create(array('inputDefaults'=>array('label'=>false,'div'=>false))) ?>
<FORM METHOD="POST">
　
	<h1>Waninaruを使ってみよう！</h1><br/>


	<h2><span>学籍番号を入力してください。</span></h2>
	<div class="account_form">ne<!--<?php echo $this->Form->input('Student_Number',array('type'=>'text','size'=>'7')); ?> -->
			<input type="text" size = "7" name="Student_Number" />  @senshu-u.jp</div>

			<div class="supplement">
				＜例＞ne23-0000Aさんの場合<br />
				<!-- <?php echo $this->Form->input('aaaa',array('type'=>'text','size'=>'7', 'value' => '230000')); ?> -->
				"ne<input type="text" disabled=”disabled” name="学籍番号" size="7" value=" 230000"　/>@senshu-u.jp"
				と入力してください。
			</div><!-- end supplement -->


		<div class="contents1">
		    <div class="btn_base">
		    
				<p><?php echo $this->Form->button('新規登録',array('class'=>'btn blue')); ?></p>
				
			</div>
		</div><!-- end contents1 -->
			<div class="supplement">
				※登録専用のURLが専修大学のGmailに送信されます。
			</div><!-- end supplement -->

<?php $this->Form->end() ?>
</div><!-- end main_container -->


<!-- 編集ここまで  -->
