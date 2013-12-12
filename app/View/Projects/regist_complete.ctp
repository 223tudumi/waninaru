<?php echo $this->Html->css(array('post'), null, array('inline'=>false)); ?>

<div id="post_container">
  <div id="post_top_container">
    <h2 id="post_top_title">投稿完了！</h2>
    <p id="post_top_flow">
      企画の内容を決める &nbsp; &raquo; &nbsp; 内容確認 &nbsp; &raquo; &nbsp; <span id="now">投稿完了！</span>
    </p>
  </div><!-- end post_top_container -->
  <div id="form_container">
    <p id="post_done_container">
      企画を投稿しました！<br /><br />
      <?php echo $this->Html->link('投稿した企画の詳細を見る' , array('controller'=>'projects' , 'action'=>'detail',$project['Project']['id']),array('title'=>'投稿した企画の詳細画面を見る') ) ?><br />
      <?php echo $this->Html->link('TOPに戻る' , array('controller'=>'index' , 'action'=>'index'),array('title'=>'TOPに戻る') ) ?>
    </p>
  </div><!-- end form_container -->
</div><!-- end post_container -->
