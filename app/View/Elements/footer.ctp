<div id="footer_container_wrapp">
	<div id="footer_container">
		<p><?php echo $this->Html->link($this->Html->image('common/footer_logo.png',array('alt'=>'Waninaru')) , array('controller'=>'index' , 'action'=>'index'),array('escape'=>false,'title'=>'Waninaru')); ?></p>
		<ul class="clearfix">
			<li><?php echo $this->Html->link('Waninaruとは' , array('controller'=>'abouts' , 'action'=>'index'),array('title'=>'Waninaruとは') ) ?></li>
			<li class="f_line">|</li>
			<li><?php echo $this->Html->link('お問い合わせ' , array('controller'=>'inquiries' , 'action'=>'index'),array('title'=>'お問い合わせ') ) ?></li>
			<li class="f_line">|</li>
			<li><?php echo $this->Html->link('利用規約' , array('controller'=>'rules' , 'action'=>'index'),array('title'=>'利用規約') ) ?></li>
		</ul>
		<ul class="clearfix">
			<li><?php echo $this->Html->link('TOP' , array('controller'=>'index' , 'action'=>'index') ,array('title'=>'Waninaru')) ?></li>
			<li class="f_line">|</li>
			<li><?php echo $this->Html->link('企画を検索する' , array('controller'=>'projects' , 'action'=>'search') ,array('title'=>'企画を検索する')) ?></li>
		</ul>
	</div><!-- end footer_container -->
</div><!-- end footer_container_wrapp -->