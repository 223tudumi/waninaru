<?php
echo $this->Html->css(array('idea'), null, array('inline'=>false));
?>

<script type="text/javascript">
jQuery(function($) {
    $('.textOverflowTest3').each(function() {
        var $target = $(this);
 
        // オリジナルの文章を取得する
        var html = $target.html();
 
        // 対象の要素を、高さにautoを指定し非表示で複製する
        var $clone = $target.clone();
        $clone
            .css({
                display: 'none',
                position : 'absolute',
                overflow : 'visible'
            })
            .width($target.width())
            .height('auto');
 
        // DOMを一旦追加
        $target.after($clone);
 
        // 指定した高さになるまで、1文字ずつ消去していく
        while((html.length > 0) && ($clone.height() > $target.height())) {
            html = html.substr(0, html.length - 1);
            $clone.html(html + '...');
        }
 
        // 文章を入れ替えて、複製した要素を削除する
        $target.html($clone.html());
        $clone.remove();
    });
});
</script>

<h2 id="idea_top_title"><span>アイデア</span></h2>


<div id="idea_top_container">


  <ul class="clearfix">


  <ul class="clearfix">
<?php foreach($idealists as $idealist): ?>
    <li><dl>
    <dd class="textOverflowTest3" >
      <?php echo h($idealist['Idea']['idea_text']); ?>
      <?php //echo print_r($idealist['User']); ?>
    </dd>
    <dt class="clearfix">
      <span class="idea_block_date">
        <?php echo h($idealist['Idea']['created']); ?>
      </span>
      <span class="idea_block_name">
        <?php echo h($idealist['User']['user_name']); ?>
      </span>
      <hr />
      <span class="more_area">
        <?php echo $this->Html->link('詳しく見る','/ideas/detail/'.$idealist['Idea']['id']); ?>
      </span>
    </dt>
    </dl></li>
<?php endforeach; ?>


  <ul>

</div><!-- end idea_top_container -->

<div id="idea_page_container">
    <ul class="clearfix">
<!--      <li><a href="#" title="前へ"><img src="./images/common/list_left.jpg" alt="前へ" height="30" /></a></li> -->
      <li class="middle"><?php echo $this->Paginator->numbers(); ?></li>
<!--      <li><a href="#" title="次へ"><img src="./images/common/list_right.jpg" alt="次へ" height="30" /></a></li> -->
    </ul>
</div><!-- end idea_page_container -->





<div id="idea_top_form">
  <div id="idea_top_form_inner">
    <p>アイディアを投稿する</p>
<?php echo $this->Form->create('Idea', array('inputDefaults' => array('label' => false,'div' => false))); ?>
        <?php echo $this->Form->input('Idea.idea_text',array('class'=>'comment_width','wrap'=>'hard')); ?>
    	<?php //echo $this->Form->hidden('User.user_id'); ?>
    	<span>
    	<?php echo $this->Form->submit('idea/submit_btn.jpg',array("div"=>false,"escape"=>false,'type'=>'submit')); ?>
    	</span>
<?php echo $this->Form->end()?>
  </div><!-- end idea_top_form_inner -->
</div><!-- end idea_top_form -->


<!-- 編集ここまで  -->
