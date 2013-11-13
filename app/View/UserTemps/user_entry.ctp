<?php echo $this->Html->css(array('account'), null, array('inline'=>false)); ?>
<div id="account_container">
<?php $this->Form->create(array('inputDefaults'=>array('label'=>false,'div'=>false))) ?>
<FORM METHOD="POST">
　
        <h1>入力確認</h1><br/>
        <div class="account_form">
        ne<input type="text" disabled=”disabled” name="学籍番号" size= "7" value="<?php print $StudentNumber; ?>"　/>さん
        </div><!-- end account_form -->


                <div class="account_form">
                <form id="formstyle">　
                        <ul>
                        <li>
                                <label><span>名前（本名）<font color="#ff333">＜必須＞</font></span><input type="text" name="name" value="<?php print $RealName; ?>" disabled=”disabled” /></label>
                        </li>
                        <li>
                                <label><span>ユーザー名＜任意＞</span><input type="text" name="username" value="<?php print $UserName; ?>" disabled=”disabled”/></label>
                        </li>
                        <li>
                                <label><span>パスワード<font color="#ff333">＜必須＞</span><input type="password" name="password" value="<?php print $Password; ?>" disabled=”disabled”/></font></label>
                        </li>


                </form>

                        <input type="checkbox" name="規約" checked="checked" disabled="disabled"><a href="#"target="_blank">利用規約</a>に同意する

        <div class="clearfix">
                <div class="float1">
                <div class="contents2">

                        
                        <p><?php echo $this->Form->Submit('登録', array('name'=>'submit', 'div'=>false, 'class'=>'btn blue')); ?><p>

           

                        </div><!-- end contents1 -->
                </div>

                <div class="float2">
                <div class="contents3">
                
                        <p><?php echo $this->Form->Submit('修正', array('name'=>'stay_submit', 'div'=>false, 'class'=>'btn red')); ?><p>
                
                </div><!-- end contents -->
        </div>

         </div>
         
<?php $this->Form->end() ?>
</div><!-- end account_form -->
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />