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
            	<!-- 設定のaタグにはリンクを張らないでください＞＜ -->
            	<a href="" title="設定"><?php echo $this->Html->image('common/header_cog_off.png',array('alt'=>'設定'));?></a>            
            	<ul>
            		<span class="cog_top">
            			<?php echo $this->Html->image('common/cog_top.png',array());?>
              		</span>
             		<span class="cog_wrapp">
             			<li><?php echo $this->Html->link('● プロフィールを変更',array('controller' => '', 'action' => '', 'title' => 'プロフィールを変更')); ?></li>
                		<li><?php echo $this->Html->link('● パスワードを変更',array('controller' => '', 'action' => '', 'title' => 'パスワードを変更')); ?></li>
                		<li><?php echo $this->Html->link('● ログアウト',array('action' => 'logout', 'title' => 'ログアウト')); ?></li>
                	</span>
                	<span class="cog_bottom">
                		<?php echo $this->Html->image('common/cog_bottom.png',array());?>
                	</span>
                </ul>
            </li>
        </ul>
        <?php echo $this->Html->link('<p><span>'.$userSession['real_name'].' さん</span></p>',array('controller'=>'','action' => '', 'title' => 'マイページへ'),array('escape'=>false)); ?>	
    </div><!-- end header_navi_container -->		
</div><!-- end header_container -->