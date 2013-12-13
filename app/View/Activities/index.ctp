<?php
echo $this->Html->css(array('activity'), null, array('inline'=>false));
echo $this->assign('title', 'Waninaru - アクティビティ');
?>

<div class="main_wrap clearfix">
	
	<div id="green_text01">
		<p>アクティビティ<p>
	</div><!-- green text01 -->
	
	<?php foreach ($activities as $active) : ?>
	<div class="wrap clearfix">
		<div class="left">
				<div class="img_wrap">
					<?php echo $this->Html->link($this->Html->image($active['image_url'].$active['image'],array('height'=>'100')),$active['url'].$active['id'],array('escape'=>false)); ?>
				</div><!-- /img_wrap -->
		</div><!-- /left -->
		<div class="right">
				<div class="title_right">
					<p><?php echo h($active['message']) ?></p>
				</div><!-- /title_right -->
			
				<div class="text_right">
					<p><?php echo h($active['created']) ?></p>
				</div><!-- /title_right -->
		</div><!-- /right -->
	</div><!-- /wrap clearfix -->
	<?php endforeach; ?>
	
</div><!-- /main_wrap -->