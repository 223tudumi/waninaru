<!-- メインコンテンツはここから編集してください！！！！  -->

<div id="account_container">
<?php $this->Form->create(array('inputDefaults'=>array('label'=>false,'div'=>false))) ?>
<FORM METHOD="POST">
　
	<h1>登録が完了しました！</h1><br/>

			<div class="supplement">
				ご登録ありがとうございます。
			</div><!-- end supplement -->

		<div class="contents4">

			<p><?php echo $this->Form->button('Waninaruを<br />使ってみる' ,array('class'=>'btn green')); ?></p>

		    <div class="btn_base"><a href="./index.html" class="btn green" name="top"  >Waninaruを<br />使ってみる</a></div>
		</div><!-- end contents4 -->
			<div class="supplement">
			</div><!-- end supplement -->

<?php $this->Form->end() ?>
</div><!-- end main_container -->


<!-- 編集ここまで  -->