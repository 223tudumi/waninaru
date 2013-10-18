<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<meta name="description" content="専修大学ネットワーク情報学部 栗芝プロジェクト2013が提案するサービスです。" />
	<?php
		echo $this->Html->charset('utf-8');
		echo $this->Html->css('common');
		echo $this->Html->css('skin');
		echo $this->Html->css('kkk');
		echo $this->Html->script(array('jquery','jquery.jcarousel','smoothScroll'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<title>Waninaru - 学生同士がスキルを共有して、アイディアを実現できるサービス | TOP</title>
</head>
<body>
<script type="text/javascript">
$(function() {
    jQuery('.list').jcarousel({
    	wrap: 'circular'
    });
});
</script>
<script type="text/javascript">
$(function(){
     $('a img').hover(function(){
        $(this).attr('src', $(this).attr('src').replace('_off', '_on'));
          }, function(){
             if (!$(this).hasClass('currentPage')) {
             $(this).attr('src', $(this).attr('src').replace('_on', '_off'));
        }
   });
});
</script>
	<div id="main_wrapp">
		<div id="main_inner">
			<?php echo $this->element('header'); ?>
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
			<p><a href="#main_wrapp" title="Page top"><?php echo $this->Html->image('common/pagetop.png',array('alt'=>'Page top'));?></a></p>
		</div><!-- end footer_top_inner -->
	</div><!-- end footer_top_wrapp -->
<div id="footer_container_wrapp">
	<div id="footer_container">
		<?php echo $this->Html->image('common/footer_logo.png',array('url'=>array('controller'=>'#','action'=>'#'),'alt'=>'Waninaru','title'=>'Waninaru'));?>
		<ul class="clearfix">
			<li><a href="" title="Waninaruと">Waninaruとは</a></li>
			<li class="f_line">|</li>
			<li><a href="#" title="お問い合わせ">お問い合わせ</a></li>
			<li class="f_line">|</li>
			<li><a href="#" title="利用規約">利用規約</a></li>
		</ul>
		<ul class="clearfix">
			<li><a href="#" title="TOP">TOP</a></li>
			<li class="f_line">|</li>
			<li><a href="#" title="企画を検索する">企画を検索する</a></li>
		</ul>
	</div><!-- end footer_container -->
</div><!-- end footer_container_wrapp -->

<div id="copy_wrrap">
		<address>Copyright (c) Kurishiba Project 2013. All Rights Reserved.</address>
</div><!-- end copy_wrrap -->
</body>
</html>
