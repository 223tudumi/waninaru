<!-- メインコンテンツはここから編集してください！！！！  -->
<?php
echo $this->Html->css(array('detail'), null, array('inline'=>false));
echo $this->assign('title', 'Waninaru - '.$kikaku['Project']['project_name']);
?>


<div id="top_detail_container" class="clearfix">
	<ul id="number_area" class="clearfix">
		<li class="clearfix">
			<span class="t_d_img"><?php echo $this->Html->image('common/project/top_bookmark.jpg',array()); ?></span>
			<span class="t_d_number">ブックマーク数：
			<?php 
			$num=0;
			foreach($kikaku['ProjectsBookmark'] as $books){
				$num++;
			}
			echo $num;
			?>
			</span>
		</li>
		<li class="clearfix">
			<span class="t_d_img"><?php echo $this->Html->image('common/project/top_comment.jpg'); ?></span>
			<span class="t_d_number">コメント数：<a href="#" title="コメント数">
			<?php echo h($commentnum);
//			foreach($comments['Comment']['id'] as $comment) {
//				echo h($comment);
//				}
			?></a></span>
		</li>
		<li class="clearfix">
			<span class="t_d_img"><?php echo $this->Html->image('common/project/top_seat.jpg') ?></span>
			<span class="t_d_number">残り席：<a href="#" title="残り席">
			<?php $rest = $kikaku['Project']['people_maxnum']-count($kikaku['projectJoiner']);?>
			<?php echo h($rest); ?> / <?php echo h($kikaku['Project']['people_maxnum']); ?></a></span>
		</li>
	</ul>
	<div id="sns_area" class="clearfix">
		<span id="twitter">
			<a href="https://twitter.com/share" class="twitter-share-button" data-lang="ja">ツイート</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		</span>
		<span id="facebook"></span>
	</div><!-- end sns_area -->
</div><!-- end top_detail_container -->



<div id="main_detail_container" class="clearfix">
	<div id="left_container">

		<div id="image_area">
			<?php echo $this->Html->image('projects/'.$kikaku['Project']['image_file_name'],array('height'=>'350'));?>
		</div><!-- end image_area -->

		<div id="join_container">
			<?php
			$check=0;
			print_r($temp);
			foreach($kikaku['projectJoiner'] as $kkk){
				if($kkk['user_id'] == $userSession['id']){
					$check=1;
					break;
				}
			}
			if($kikaku['Project']['people_maxnum']>count($kikaku['projectJoiner'])){
				if($userSession!=null){
					if($check == 0){
						$msg = __('参加しますか？', true);
						echo $this->Html->image('common/project/join_btn.jpg',array('url'=>array('controller'=>'projects','action'=>'join',$kikaku['Project']['id']),'alt'=>'参加する','width'=>'350','onClick'=>"return confirm('$msg')"));
					}else{
						$msg = __('参加やめますか？', true);
						echo $this->Html->image('common/project/join_out_btn.jpeg',array('url'=>array('controller'=>'projects','action'=>'out',$kikaku['Project']['id']),'alt'=>'参加をやめる','width'=>'350','onClick'=>"return confirm('$msg')"));
					}
				}else{
					echo $this->Html->image('common/project/join_btn.jpg',array('url'=>array('controller'=>'user_temps','action'=>'account_entry'),'alt'=>'参加する','width'=>'350'));
				}
			}
			
			?>
			<p id="j_seat"><?php $rest = $kikaku['Project']['people_maxnum']-count($kikaku['projectJoiner']);
			echo h($rest);
			?><p>
			<p id="j_date"><?php echo h($kikaku['Project']['recrouit_date']); ?>まで<br />全<?php echo h($kikaku['Project']['people_maxnum']); ?>席<p>
		</div><!-- end join_container -->
		<div id="bkm_good_contianer" class="clearfix">
			<span id="bkm">
			<?php 
			$mode=0;
			foreach($kikaku['ProjectsBookmark'] as $books){
				if($books['user_id']==$userSession['id']){
					$mode=1;
				}
			}
			if($mode!=1){
				echo $this->Html->image('common/project/bkm_btn.jpg',array('url'=>array('controller'=>'ProjectsBookmarks','action'=>'regist',$kikaku['Project']['id']),'alt'=>'ブックマークする'));
			}
			?>
			</span>
			<!-- <span id="good"><a href="#" title="いいね！"><?php echo $this->Html->image('common/project/good_btn.jpg',array('alt'=>'いいね！')); ?></a></span> -->
		</div>
		<!-- 
		<dl id="tag_container" class="clearfix">
			<dt>タグ：</dt>
			<?php $tagstr = $tags['Tag']['tag_text'];
			$search_str = explode("\n",$tagstr);
			?>
			<dd><?php foreach($search_str as $search): ?>
			<span><?php echo h($search);?></span>
			<?php endforeach; ?></dd>
		</dl>
		 -->
		<div id="planning_container">
			
			<p>企画者：
			<?php
			foreach($kikaku['projectUser'] as $producer){
				if($userSession!=null){
					echo h($producer['real_name']);
				} else {
					echo h($producer['user_name']);
				}
			}
			?> </p>
			<!--  <p><a href="#" onclick="fold('sub_fold'); return false;">企画者を全員表示</a><p>  -->
			<p id="sub_fold"> <br />
		</div><!-- end planning_container -->

	</div><!-- end left_container -->




	<div id="right_container">

		<div id="ivent_name_area">
			<p><?php echo h($kikaku['Project']['project_name']); ?></p>
		</div><!-- end ivent_name_area -->

		<div id="ivent_date_area">
			<p><?php echo h($kikaku['Project']['active_date']); ?>～</p>
		</div><!-- end ivent_date_area -->

		<div id="ivent_place_area">
			<p><?php echo h($kikaku['Project']['active_place']); ?></p>
		</div><!-- end ivent_place_area -->

		<div id="about_area">
			<p>
			<?php echo $kikaku['Project']['detail_text']; ?>
		</p>
		</div><!-- end about_area -->

	</div><!-- end right_container -->



</div><!-- end main_detail_container -->






<div id="comment_container">
	<div id="comment_top_title">
		<span>コメント</span>
	</div><!-- comment_top_title -->
<?php foreach($comments as $num=>$comment): ?>
	<div class="comment_view_area">
		<span><?php echo $this->Html->image('common/project/comment_back_top.jpg'); ?></span>
		<div class="comment_wrrap">
			<p>No.<?php echo h($num+1); ?> <?php echo h($comment['Comment']['id']); ?></p>
			<p><?php echo h($comment['Comment']['comment_text']); ?></p>
			<dl class="clearfix">
				<dt></dt>
				<dd>
				<?php
				if($comment['User']['id']==$producer['id']){
					echo h('企画者 ');
				}
				if($userSession!=null){
					echo pr($comment['User']['real_name']);
				}else{
					echo pr($comment['User']['user_name']);
				}
				?></dd>
			</dl>
			<dl class="clearfix">
				<dt></dt>
				<dd>
				<?php
				if($userSession!=null){
					foreach($kikaku['projectUser'] as $producer){
						if($userSession['id']==$producer['id']){
							echo $this->Form->button('削除',array('onclick' => "location.href = '" . $this->Html->url("/comments/delete/{$comment['Comment']['id']}/{$comment['Comment']['project_id']}") . "'"));
							break;
						}else if($userSession['id']==$comment['Comment']['user_id']){
							echo $this->Form->button('削除',array('onclick' => "location.href = '" . $this->Html->url("/comments/delete/{$comment['Comment']['id']}/{$comment['Comment']['project_id']}") . "'"));
							break;
						}
					}
				}
				?></dd>
			</dl>
		</div><!-- comment_wrapp  -->
		<span><?php echo $this->Html->image('common/project/comment_back_bottom.jpg'); ?></span>	
	</div><!-- end comment_view_area -->
<?php endforeach; ?>	

	<div id="comment_contribute_container">
		<?php echo $this->Form->create('Comment', array('inputDefaults' => array('label' => false,'div' => false))); ?>
			<?php echo $this->Form->input('Comment.comment_text',array('class'=>'comment_width','wrap'=>'hard')); ?>
			<?php echo $this->Form->hidden('Comment.project_id'); ?>
			<?php echo $this->Form->hidden('Comment.user_id'); ?>
			<span id="submit_btn"><?php echo $this->Form->submit('idea/submit_btn.jpg',array("div"=>false,"escape"=>false,'type'=>'submit')); ?></span>
		<?php echo $this->Form->end() ?>
	</div><!-- end comment_contribute_container -->

</div><!-- end comment_container -->



