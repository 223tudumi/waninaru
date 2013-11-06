<div id="kkk_container" class="clearfix">
	<div id="g1">
		<div id="title" class="clearfix">
			<h1>管理者一覧</h1>
		</div>
		<font size="3">
			<TABLE width="100%" height="50" border="1">
				<tr bgcolor="#e3f0fb">
					<TH align="left">ID</TH>
					<TH align="left">ID</TH>
					<TH align="left">パスワード</TH>
				</TR>
				<?php foreach ($admins as $admin) : ?>
					<TR>
						<TD align="left"><?php echo h($admin['Admin']['id']); ?></TD>
						<TD align="left"><?php echo h($admin['Admin']['username']); ?></TD>
						<TD align="left"><?php echo h($admin['Admin']['password']); ?></TD>
					</TR>
				<?php endforeach; ?>
			</TABLE>
		</font>
	</div>
	<?php echo $this->element('admin_menu'); ?>
</div>