<div id ="link1">
		<span style="line-height:25px;">
			<font size="3">
				<?php echo $this->Html->link('ユーザ検索一覧' , array('controller'=>'users' , 'action'=>'admin_index') ) ?><br/>
				<?php echo $this->Html->link('ユーザ新規登録' , array('controller'=>'users' , 'action'=>'admin_userRegist') ) ?><br/>
				<?php echo $this->Html->link('企画検索一覧' , array('controller'=>'projects' , 'action'=>'admin_index') ) ?><br/>
			</font>
		</span>
	</div>
</div>