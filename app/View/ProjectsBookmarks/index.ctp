<?php
echo $this->Html->css(array('my_top','my_join'), null, array('inline'=>false));
echo $this->assign('title', 'Waninaru - ブックマーク（企画）');
?>
<ul class="menu">
		<li><a href="./my_join.html">参加中</a></li>
		<li><a href="#">ブックマーク</a>
			<ul>
				<li><a href="bkmr_idea.html" title="ブックマークアイディア">アイディア</a></li>
				<li><a href="bookmark.html" title="ブックマーク企画">　　企　画</a></li>
				<li><a href="#" title="ブックマークユーザ">　　ユーザ</a></li>
			</ul>
		</li>
		<li><a href="#">投稿</a>
			<ul>
				<li><a href="#" title="投稿アイディア">アイディア</a></li>
				<li><a href="#" title="投稿企画">　　企　画</a></li>
			</ul>
		</li>
	</ul><!--end menu--><br /><br /><br />


	<div id="green_text01">
		<p>ブックマーク企画<p>
	</div><!-- green text01 -->





<div id="search_result">
	<ul class="clearfix">
	<?php foreach ($date as $project) : ?>
		<li>
			<div class="background"><?php echo $this->Html->image('common/orange.png',array()); ?></div>
			<div class="thumb">
			<?php echo $this->Html->link($this->Html->image("projects/".$project['Project']['image_file_name'],array('height'=>'200')),'/projects/detail/'.$project['Project']['id'],array('escape'=>false)); ?></div>
			<div class="text">残り席</div>
			<div class="seat_number">
			<?php
						$rest = $project['Project']['people_maxnum']-count($project['projectJoiner']);
						echo h($rest);
						?>
			</div>
			<div class="title"><?php echo h($project['Project']['project_name']); ?></div>
			<div class="date"><?php echo h($project['Project']['active_date']); ?> 開催!!</div>
		</li>
	<?php endforeach; ?>
	</ul>
</div><!-- end search_result -->



<div id="search_result_bottom" class="clearfix">
	<ul class="clearfix">
		<li><span class="prev disabled"><?php echo $this->Html->image('common/list_left.jpg',array('width'=>'30','alt'=>'前へ')); ?></span></li>
		<li class="middle"><?php echo $this->Paginator->numbers(); ?></li>
		<li><span class="next disabled"><?php echo $this->Html->image('common/list_right.jpg',array('width'=>'30','alt'=>'前へ')); ?></span></li>
	</ul>
</div><!-- end search_result_bottom -->
