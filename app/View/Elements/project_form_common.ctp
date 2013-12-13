<?php echo $this->Form->create('Project',array('enctype' => 'multipart/form-data','inputDefaults' => array('label' => false,'div' => false))); ?>
      <ul>
        <li><dl class="clearfix">
          <dt><span>企画タイトル</span></dt>
          <dd>
            <span class="form_area">
            <?php echo $this->Form->input('Project.project_name', array('class'=>'middle_area tipped','title'=>'<例> ○○をしよう！ ○○を作ろう！ など')); ?></span>
            <span class="attention_area">
              <span class="attention_area_inner">
                簡潔でわかりやすいものにしましょう！
              </span>
            </span>
          </dd>
        </dl></li>
        <li><dl class="clearfix">
          <dt><span>開催日時</span></dt>
          <dd>
            <span class="form_area pt_10">
            <?php echo $this->Form->input('Project.active_date', array('separator' => array('年', '月', '日<br /><br />開催する時間：'),'timeFormat' => '24','dateFormat' => 'YMD', 'maxYear' => date('Y')+3, 'minYear' => date('Y'), 'monthNames' => false,'label'=>'開催する日： ')); ?>
            </span>
            <span class="attention_area">
              <span class="attention_area_inner">
                平日のお昼休みや授業の区切れ目の時間に設定するのがベストです。
              </span>
            </span>
          </dd>
        </dl></li>
        <li><dl class="clearfix">
          <dt><span>参加締切の日時</span></dt>
          <dd>
            <span class="form_area pt_10">
            <?php echo $this->Form->input('Project.recrouit_date', array('separator' => array('年', '月', '日<br /><br />締め切り時間：'),'timeFormat' => '24','dateFormat' => 'YMD', 'maxYear' => date('Y')+3, 'minYear' => date('Y'), 'monthNames' => false,'label'=>'締め切り日： ')); ?>
            </span>
            <span class="attention_area">
              <span class="attention_area_inner">
                企画の参加者を募集する期間の締め切りを設定します。
              </span>
            </span>
          </dd>
        </dl></li>
        <li><dl class="clearfix">
          <dt><span>参加者の人数</span></dt>
          <dd>
            <span class="form_area">
            <?php echo $this->Form->input('Project.people_maxnum', array('type'=>'text','class'=>'xsmall_area tipped')); ?>　人</span>
            <span class="attention_area">
              <span class="attention_area_inner">
                企画参加者の最大人数を設定します。<br />
                単独で企画を行う場合は、数人〜10人程度にとどめておくのがオススメです。
              </span>
            </span>
          </dd>
        </dl></li>
        <li><dl class="clearfix">
          <dt><span>開催場所</span></dt>
          <dd>
            <span class="form_area">
            <?php echo $this->Form->input('Project.active_place', array('class'=>'middle_area tipped','title'=>'<例> 1号館4F ディスカッションスペース1')); ?>
            </span>
            <span class="attention_area">
              <span class="attention_area_inner">
                大学の教室やゼミ室を使用する場合は、事前にサイボウズや教務課等に使用する旨を申請してください。<br />1号館のディスカッションスペース等の公共スペースを使用する場合は、開催する前の時間に場所を確保しておくと良いでしょう。
              </span>
            </span>
          </dd>
        </dl></li>
        <li><dl class="clearfix">
          <dt><span>企画の内容</span></dt>
          <dd>
            <span class="form_area">
              <?php echo $this->Form->input('Project.detail_text', array('wrap'=>'hard','class'=>'contents_area','default'=>'○概要
<例> PCやスマホ、スケボetc…に貼る世界に一つだけのあなたのオリジナルステッカーを作ってみませんか？イラストのデータを事前にご用意していただくだけで簡単に作成することができます！みんなで楽しくわいわい作りましょう！！

○企画内容
募集人数：
諸経費： 
場所：
対象： 
日時：xx月xx日（月）00:00 - 00:00（00分）
持ち物： 

○当日の進行
1．
2．
3． 
4．')); ?>
            </span>
            <span class="attention_area">
              <span class="attention_area_inner">
                企画の概要・具体的な内容・当日にどんな事を行うのか等、自由に記入してください。<br />「どんな事を書けば良いのかわからない！」という方は、左フォームにあるテンプレートをご利用ください。
              </span>
            </span>
          </dd>
        </dl></li>
        <li><dl class="clearfix">
          <dt><span>イメージ画像</span></dt>
          <dd>
            <span class="form_area pt_10">
              <?php echo $this->Form->input('Project.image_file_name', array('type' => 'file','id'=>'image','class'=>'image_area')); ?>
              <span class="thumb_image_area">
              <img src="../img/common/project/thumb_image.jpg" id="preview" alt="preview" width="310px" />
              </span>
            </span>
            <span class="attention_area">
              <span class="attention_area_inner">
                企画のイメージに合った画像をアップロードしてください。<br />
                350px*350px以上の正方形の画像が推奨サイズです。<br /><br />
                ※著作権を侵害している可能性のある画像は使用しないでください。不安な方は、自分で撮影した写真及び著作権フリーの写真素材等を使用するようお願い致します。<br /><br />
                ※他の方が写っている写真を使用する場合は、必ずその方に使用許可を得るようにしてください。<br /><br />
                (※イメージ画像を投稿しない場合は、No Imageと表示されます)
              </span>
            </span>
          </dd>
        </dl></li>
      </ul>
      <div id="submit_btn_container">
        <?php echo $this->Form->submit('../img/common/project/form01_btn.jpg',array('type'=>'submit','width'=>'270','name'=>'mode','value'=>'confirm'))?>
        <?php echo $this->Form->hidden('hidden',array('value'=>'confirm')); ?>
      </div><!-- end submit_btn_container -->

    <?php $this->Form->end(); ?>