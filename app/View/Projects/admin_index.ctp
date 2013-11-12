<?php echo $this->Html->css(array('kkk'), null, array('inline'=>false)); ?>
<div id="kkk_container" class="clearfix">
	<div id="g1">
		<div id="title" class="clearfix">
			<h1>企画検索一覧</h1>
		</div>
		<font size="3">
			<TABLE width="100%" height="50" border="1">
				<TR bgcolor="#e3f0fb">
					<TH align="left">ID</TH>
					<TH align="left">image</TH>
					<TH align="left">企画名</TH>
					<TH align="left">企画者</TH>
					<TH align="left">実施日</TH>
					<TH align="left">詳細</TH>
				</TR>
				<?php foreach ($projects as $project) : ?>
					<TR>
						<td><?php echo h($project['Project']['id']); ?></td>
						<td><?php echo $this->Html->image("projects/".$project['Project']['image_file_name'],array('alt' =>$project['Project']['image_file_name'],'width'=>'50','height'=>'50')); ?></td>
						<td><?php echo h($project['Project']['project_name']); ?></td>
						<td><?php foreach ($project['projectUser'] as $producer){ echo h($producer['real_name']); } ?></td>
						<td><?php echo h($project['Project']['active_date']); ?></td>
						<td><?php echo $this->Html->link('詳細','/admin/projects/projectDetail/'.$project['Project']['id']); ?></td>
					</TR>
				<?php endforeach; ?>
			</TABLE>
		</font>
	</div>
	<?php echo $this->element('admin_menu'); ?>
</div>