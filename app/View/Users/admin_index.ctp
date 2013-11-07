<div id="kkk_container" class="clearfix">
	<div id="g1">
		<div id="title" class="clearfix">
			<h1>ユーザ検索一覧</h1>
		</div>
		<font size="3">
			<TABLE width="100%" height="50" border="1">
				<tr bgcolor="#e3f0fb">
					<TH align="left">ID</TH>
					<TH align="left">学籍番号</TH>
					<TH align="left">本名</TH>
					<TH align="left">ユーザ名</TH>
					<TH align="left">詳細</TH>
				</TR>
				<?php foreach ($users as $user) : ?>
					<TR>
						<TD align="left"><?php echo h($user['User']['id']); ?></TD>
						<TD align="left"><?php echo h($user['User']['student_number']); ?></TD>
						<TD align="left"><?php echo h($user['User']['real_name']); ?></TD>
						<TD align="left"><?php echo h($user['User']['user_name']); ?></TD>
						<TD align="left"><?php echo $this->Html->link('詳細','/admin/users/userDetail/'.$user['User']['id']); ?></TD>
					</TR>
				<?php endforeach; ?>
			</TABLE>
		</font>
	</div>
	<?php echo $this->element('admin_menu'); ?>
</div>