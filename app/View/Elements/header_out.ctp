<div id="header_container" class="clearfix">
	<div id="header_logo">
		<?php echo $this->Html->image('common/header_logo.png',array('url'=>array('controller'=>'index','action'=>'index'),'alt'=>'Waninaru','title'=>'Waninaru'));?>
	</div><!-- end header_logo --> 
	<div id="header_navi_container" class="clearfix">
		<ul class="clearfix">
			<li><?php echo $this->Html->image('common/header_search_off.png',array('url'=>array('controller'=>'projects','action'=>'search'),'alt'=>'検索する','title'=>'検索する'));?></li>
      		<li><?php echo $this->Html->image('common/header_act_off.png',array('url'=>array('controller'=>'activities','action'=>'index'),'alt'=>'アクティビティ','title'=>'アクティビティ'));?></li>
       		<li><?php echo $this->Html->image('common/header_post_off.png',array('url'=>array('controller'=>'projects','action'=>'regist'),'alt'=>'投稿する','title'=>'投稿する'));?></li>	
       		<li>
       			<a href="" title="設定"><?php echo $this->Html->image('common/header_cog_off.png',array('alt'=>'設定'));?></a>   
       			<ul>
       				<span class="cog_top">
       					<?php echo $this->Html->image('common/cog_top.png',array());?>
       				</span>
         			<span class="cog_wrapp">
         				<li><?php echo $this->Html->link('● アカウントを作成する',array('controller' => 'user_temps', 'action' => 'account_entry', 'title' => 'アカウントを作成する')); ?></li>
                		<li><?php echo $this->Html->link('● パスワードを忘れた',array('controller' => '', 'action' => '', 'title' => 'パスワードを忘れた方はこちら')); ?></li>
              		</span>
              		<span class="cog_bottom">
              			<?php echo $this->Html->image('common/cog_bottom.png',array());?>
              		</span>
              	</ul>
            </li>
        </ul>
       <?php echo $this->Html->link('<p><span>ログインする</span></p>',array('controller' => 'users', 'action' => 'login', 'title' => 'パスワードを忘れた方はこちら'),array('escape'=>false)); ?>
	</div><!-- end header_navi_container -->
</div><!-- end header_container -->