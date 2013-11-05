<div id="footer_container_wrapp">
	<div id="footer_container">
		<?php echo $this->Html->image('common/footer_logo.png',array('url'=>array('controller'=>'#','action'=>'#'),'alt'=>'Waninaru','title'=>'Waninaru'));?>
		<ul class="clearfix">
			<li><?php echo $this->Html->link('Waninaruとは' , array('controller'=>'abouts' , 'action'=>'index') ) ?></li>
			<li class="f_line">|</li>
			<li><?php echo $this->Html->link('お問い合わせ' , array('controller'=>'inquiries' , 'action'=>'index') ) ?></li>
			<li class="f_line">|</li>
			<li><?php echo $this->Html->link('利用規約' , array('controller'=>'rules' , 'action'=>'index') ) ?></li>
		</ul>
		<ul class="clearfix">
			<li><?php echo $this->Html->link('TOP' , array('controller'=>'index' , 'action'=>'index') ) ?></li>
			<li class="f_line">|</li>
			<li><a href="#" title="企画を検索する">企画を検索する</a></li>
		</ul>
	</div><!-- end footer_container -->
</div><!-- end footer_container_wrapp -->