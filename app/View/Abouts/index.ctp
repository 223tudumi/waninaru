<?php
echo $this->Html->css('about', null, array('inline'=>false));
echo $this->assign('title', 'Waninaru - Waninaruとは ');
?>
<div id="contents_container">
	<div id="contents01_wrrap">			
		<div id="contents01_inner">
			<div id="key_container">
				<span><?php echo $this->Html->image('about/key_logo.png',array('alt'=>'Waninaru','width'=>'400px'));?></span>
				<p>学生同士がスキルを共有して、アイディアを実現できる場の提供</p>
			</div><!-- end key_container -->
			<div id="contents01_image01">
				<?php echo $this->Html->image('about/key_flower.png',array('alt'=>'','width'=>'30px'));?>
			</div><!-- end contents01_image01 -->
			<div id="contents01_image02">
				<?php echo $this->Html->image('about/about_balloon01.png',array('alt'=>'とは、何だ!?','width'=>'180px'));?>
			</div><!-- end contents01_image02 -->
			<div id="contents01_image03">
				<?php echo $this->Html->image('about/wani01.png',array('alt'=>'','width'=>'225px'));?>
			</div><!-- end contents01_image03 -->
		</div><!-- end contents01_inner -->
	</div><!-- end contents01_wrrap  -->
	<div id="contents02_wrrap">
		<div id="contents02_inner">
			<div id="contents02_main" class="clearfix">
				<p>
					Waninaruは、ネットワーク情報学部生を繋げる企画支援サービスです。<br />
					このサービスでは、お互いのスキルを共有したり、繋がりの輪を広げたり、一人ではできないことを、
					ネットワーク情報学部生同士が協力して実現できるよう手助けをします。<br />
					例えば、スポーツ大会に参加、スマホ向けゲームを開発、気軽に勉強会を開催することなどができます。
				</p>
				<span><?php echo $this->Html->image('about/image01.jpg',array('alt'=>'','width'=>'220px'));?></span>
			</div><!-- end contents02_main -->
		</div><!-- end contents02_inner -->
	</div><!-- end contents02_wrrap  -->
	<div id="contents03_wrrap">
		<div id="contents03_inner">
			<p><?php echo $this->Html->image('about/contents03_passage.png',array('alt'=>'自分の好みの企画の立案、あるいは参加をしましょう！あなたの知らない可能性が広がっています。'));?></p>
		<span id="join_image"><?php echo $this->Html->image('about/contents03_wani.png',array('alt'=>'','width'=>'400'));?></span>
		</div><!-- end contents03_inner -->
	</div><!-- end contents03_wrrap  -->
	<div id="contents04_wrrap">
		<div id="contents04_inner">
			<h2><?php echo $this->Html->image('about/member_title.png',array('alt'=>'','width'=>''));?></h2>
			<p>栗芝プロジェクト2013</p>
			<ul>
				<li>代表　村越 菜央</li>
				<li>副代表　関 千裕</li>
				<li>大塚 尚幸</li>
				<li>市村 俊介</li>
				<li>間嶋 将平</li>
				<li>江本 夏輝</li>
				<li>飯田 隼</li>
				<li>永岡 有沙</li>
				<li>小出 萌波</li>
				<li>諸星 真梨奈</li>
			</ul>
		</div><!-- end contents04_inner -->
	</div><!-- end contents04_wrrap  -->
	<div id="contents05_wrrap">
		<div id="contents05_inner">
			<h2><?php echo $this->Html->image('about/process.png',array('alt'=>'','width'=>''));?></h2>
			<ul>
				<li><dl class="clearfix">
					<dt>2013年10月</dt>
					<dd>プレ企画活動<br />Waninaruプレオープン</dd>
				</dl></li>
				<li><dl class="clearfix">
					<dt>2013年4月</dt>
					<dd>栗芝プロジェクト2013発足</dd>
				</dl></li>
			</ul>
		</div><!-- end contents05_inner -->
	</div><!-- end contents05_wrrap  -->
</div><!-- end contents_container  -->
