<?php
echo $this->Html->css(array('bkmr_idea'), null, array('inline'=>false));
echo $this->assign('title', 'Waninaru - ブックマーク（アイデア）');
?>
<ul class="menu">
		<li><a href="./my_join.html">参加中</a></li>
		<li><a href="#">ブックマーク</a>
			<ul>
				<li><a href="bkmr_idea.html" title="ブックマークアイデア">アイデア</a></li>
				<li><a href="bookmark.html" title="ブックマーク企画">　　　企画</a></li>
				<li><a href="#" title="ブックマークユーザ">　　ユーザ</a></li>
			</ul>
		</li>
		<li><a href="#">投稿</a>
			<ul>
				<li><a href="#" title="投稿アイデア">アイデア</a></li>
				<li><a href="#" title="投稿企画">　　　企画</a></li>
			</ul>
		</li>
	</ul><!--/menu-->





	<div id="green_text01">
		<p>ブックマークしたアイデア<p>
	</div><!-- /green text01 -->
<?php $number = 1; ?>
<?php foreach($date as $idea):?>
<div class ="wrap clearfix">

	<div class="left">
	<div class="content1 clearfix">
		<div class="content_wrap clearfix">
			<div class="number">
				<p><?php echo h($number);
				$number++; ?></p>
			</div><!-- /number -->
			
			<div class="yourname">
				<p><?php echo h($idea['User']['user_name']); ?></p>
			</div><!-- /yourname -->
		</div><!-- /content_wrap clearfix -->
		
		<div class="translation">
			<p><?php echo h($idea['Idea']['created']); ?></p>
		</div><!-- /translation -->
	</div><!-- /content clearfix -->

	<div class="content2 clearfix">	
		<div class="idea_comment">
			<p><?php echo h($idea['Idea']['idea_text']); ?></p>
		</div><!-- /idea_comment -->
		<div class="continuance">
			<?php echo $this->Html->link("続きを表示する",'/ideas/detail/'.$idea['Idea']['id'],array('escape'=>false)); ?>
		</div><!-- /continuance -->

	</div><!-- /content clearfix -->


</div><!-- /left clearfix -->


	<div class="delete">
		<?php //<img src = "images/bkmr_idea/idea_bkm_d_btn.jpg" width = "170" height = "50" alt = ""> ?>
		<?php echo $this->Html->image('idea/idea_bkm_d_btn.jpg',array('url'=>array('controller'=>'IdeasBookmarks','action'=>'listdelete',$idea['Idea']['id']),'alt'=>'ブックマークを外す')); ?>
	</div><!-- /delete -->
	
</div><!-- /wrap clearfix -->
<?php endforeach; ?>
