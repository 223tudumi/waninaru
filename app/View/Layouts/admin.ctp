<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<meta name="description" content="専修大学ネットワーク情報学部 栗芝プロジェクト2013が提案するサービスです。" />
	<?php
		echo $this->Html->charset('utf-8');
		echo $this->Html->css(array('common','skin'));
		echo $this->Html->script(array('jquery','jquery.jcarousel','smoothScroll','jquery.formtips'));
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<title>Waninaru - 学生同士がスキルを共有して、アイディアを実現できるサービス | TOP</title>
</head>
<body>
<?php echo $this->element('body_script'); ?>
	<div id="main_wrapp">
		<div id="main_inner">
			<?php
			if($userSession==null){
				echo $this->element('header_out');
			}else{
				echo $this->element('header_in');
			}
			?>
		<!-- メインコンテンツ開始  -->
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<!-- メインコンテンツ終了  -->
		</div><!-- end main_inner -->
	</div><!-- end main_wrapp -->
	<div id="footer_top_wrapp">
		<div id="footer_top_inner">
			<p><a href="#main_wrapp" title="Page top"><?php echo $this->Html->image('common/pagetop_off.png',array('alt'=>'Page top'));?></a></p>
		</div><!-- end footer_top_inner -->
	</div><!-- end footer_top_wrapp -->
<?php echo $this->element('footer'); ?>
<div id="copy_wrrap">
		<address>Copyright (c) Kurishiba Project 2013. All Rights Reserved.</address>
</div><!-- end copy_wrrap -->
</body>
</html>
