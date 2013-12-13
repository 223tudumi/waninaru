<!-- メインコンテンツはここから編集してください！！！！  -->
<?php echo $this->Html->css(array('my_prof'), null, array('inline'=>false)); ?>

<div id ="my_prof_container">
	
	<div id="green_text01">
		<p>変更完了</p>
	</div><!--end green_text0-->
		
	<div class="row">
		<div id="space">
			<span class="comment">プロフィールの変更が完了致しました。<br />
			<a href="./index/<?php echo $userinfo['User']['id']; ?>">マイプロフィール</a>にお戻り下さい。
			</span>
		</div><!--end space -->
	</div><!-- end row -->
		
</div><!--end my_prof_container-->

<!-- 編集ここまで  -->