<div id="main_container">
<!--
	<h2><span>おすすめ企画</span></h2>
	<div class="main_list_area">
		<div class="main_list">
			<ul class="clearfix list jcarousel-skin-tango">
				<li>
					<div class="background"><img src="./images/common/orange.png" alt="" /></div>
					<div class="thumb"><img src="./images/top/sample01.jpg" alt="" height="200" /></div>
					<div class="text">残り席</div>
					<div class="seat_number">11</div>
					<div class="title">タイトルテストタイトルテストタイトルテスト</div>
					<div class="date">2013/10/24 10:30～</div>
				</li>
			</ul>
		</div>
	</div>		
-->
	<h2><span>新着企画</span></h2>
	<div class="main_list_area">
		<div class="main_list">
			<ul class="clearfix list jcarousel-skin-tango">
			<?php foreach($news as $new): ?>
				<li>
					<div class="background"><?php echo $this->Html->image('common/orange.png'); ?></div>
					<div class="thumb">
					<?php echo $this->Html->link($this->Html->image("projects/".$new['Project']['image_file_name']),'/projects/detail/'.$new['Project']['id'],array('escape'=>false)); ?></div>
					<div class="text">残り席</div>
					<div class="seat_number">
						<?php
						$rest = $new['Project']['people_maxnum']-count($new['projectJoiner']);
						echo h($rest);
						?>
					</div>
					<div class="title"><?php echo h($new['Project']['project_name']); ?></div>
					<div class="date"><?php echo h($new['Project']['created']); ?></div>
				</li>
			<?php endforeach; ?>
			</ul>
		</div><!-- end main_list -->
	</div><!-- end main_list_area -->		
<!--
	<h2><span>人気企画</span></h2>
	<div class="main_list_area">
		<div class="main_list">
			<ul class="clearfix list jcarousel-skin-tango">
				<li>
					<div class="background"><img src="./images/common/orange.png" alt="" /></div>
					<div class="thumb"><img src="./images/top/sample01.jpg" alt="" height="200" /></div>
					<div class="text">残り席</div>
					<div class="seat_number">11</div>
					<div class="title">タイトルテストタイトルテストタイトルテスト</div>
					<div class="date">2013/10/24 10:30～</div>
				</li>
			</ul>
		</div>
	</div>
-->
</div><!-- end main_container -->