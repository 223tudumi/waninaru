<!-- メインコンテンツはここから編集してください！！！！  -->
<?php
echo $this->Html->css(array('search'), null, array('inline'=>false));
echo $this->assign('title', 'Waninaru - 企画検索');
?>

<div id="search_container" class="clearfix">

<div id ="container_wrap" class="clearfix">

<div id="container" class="clearfix">

		<div id="wrapper" class="clearfix">

		<form id="inform">
			
		<div id="head">
		
		 <ul id="radio_list" class="clearfix">
		 <?php echo $this->Form->create('Searchsystem', array('method'=> 'POST','inputDefaults' => array('label' => false,'div' => false))); ?>
            <li class="left"><?php //echo $this->Form->input('Searchsystem.mode', array('name'=>'radiobtn','type' => 'radio', 'options' => array('1'=>'キーワード'))); ?><label for="keyword">キーワード</label></li>
            <li class="right"><?php //echo $this->Form->input('Searchsystem.mode', array('name'=>'radiobtn','type' => 'radio', 'options' => array('2'=>'タグ'))); ?><label for="tag"></label></li>
		</ul><!-- end radio_list-->
		
		</div><!-- end head -->

		<div id="division">
			<?php echo $this->Form->input('Searchsystem.stext',array('name'=>'search_text','type'=>'text','class'=>'search_text','wrap'=>'hard','value'=>$search_title)); ?>	
		</div><!-- end division -->
		</div><!-- end wrapper clearfix -->
			<div id="contents">
<!--				<table border ="0" id="menu">
					<tr>
						<td>実施日 ：</td>
						<td>
							<a href="javascript:cal1.write();">
								<?php echo $this->Form->input('start_date',array('name'=>'start_data','type'=>'text','style'=>'color: #808080; width: 150px;','onFocus'=>'HideFormGuide(this,"2013/01/01")','onBlur'=>'ShowFormGuide(this,"2013/01/01")')); ?>
								<a href="javascript:cal1.write();"><?php echo $this->Html->image('project/cal.gif',array('width'=>'16','height'=>'16','border'=>'0','alt'=>'カレンダーを表示')); ?></a>
									<!-- img src="./images/cal.gif" width="16" height="16" border="0" alt="カレンダーを表示" --></a>
									<!--  <input type="text" name="colname" onClick="cal1.write();" onChange="cal1.getFormValue(); cal1.hide();">   
										<div id="calid"></div>
						</td>
						<td><span class="margin_space">〜</span></td>
						<td>
							<a href="javascript:cal2.write();">
								<?php echo $this->Form->input('end_date',array('name'=>'end_data','type'=>'text','style'=>'color: #808080; width:150px')); ?>
								<a href="javascript:cal2.write();"><?php echo $this->Html->image('project/cal.gif',array('width'=>'16','height'=>'16','border'=>'0','alt'=>'カレンダーを表示')); ?></a>
									<!-- img src="./images/cal.gif" width="16" height="16" border="0" alt="カレンダーを表示" --></a>
									<!--  <input type="text" name="start_date" onClick="cal2.write();" onChange="cal2.getFormValue(); cal2.hide();">   
										<div id="caldiv2"></div>
						</td>
					</tr>
				</table> -->
			</div><!-- end contents -->

</div><!-- end container clearfix--> 

<div id="sub">
	<?php echo $this->Form->submit('common/project/search.png',array('alt'=>'送信する')); ?><!--  <input type="image" src="./images/search.png" alt="送信する" name="" value="検索" onClick="javascript:checkSubmit(forms['referrer'],forms['referrer'].elements['calendar1'],forms['referrer'].elements['calendar2'])"></a>-->
	<?php echo $this->Form->end() ?>
</div><!-- end sub-->
</div><!-- end container_wrap clearfix--> 
</div><!-- end search_container clearfix--> 
</form><!-- end inform -->


<div id ="pulldown">
<!--	<select name="menu">
		<option value="1" selected>ここを選択して下さい</option>
		<option value="2">おすすめ順</option>
		<option value="3">日付順</option>
		<option value="4">人気順</option>
	</select> -->
</div><!-- end pulldown -->


<div id="search_result">
	<ul class="clearfix">
	<?php if(!empty($_REQUEST['search_text'])): ?>
		<?php $keyword = $_REQUEST['search_text']; ?>
		<?php $search_strs = explode(" ",$keyword); ?>
		<?php $proid = 0; ?>
			<?php foreach($searches as $search): ?>
			<?php foreach($search_strs as $search_str): ?>
				<?php if(preg_match("/$search_str/",$search['Project']['project_name'])):?>
					<?php if(!($search['Project']['id'] == $proid)): ?>
		<li>
			<div class="background"><?php echo $this->Html->image('common/project/orange.png'); ?></div>
			<div class="thumb"><?php echo $this->Html->link($this->Html->image("projects/".$search['Project']['image_file_name'],array('height'=>'200')),'/projects/detail/'.$search['Project']['id'],array('escape'=>false));?></div>
			<div class="text">残り席</div>
			<div class="seat_number"><?php
								$rest = $search['Project']['people_maxnum']-count($search['projectJoiner']);
								echo h($rest);
								?>
			</div>
			<div class="title"><?php echo h($search['Project']['project_name']); ?></div>
			<div class="date"><?php echo h($search['Project']['created']); ?></div>
		</li>
		<?php $proid = $search['Project']['id'];//array_push($projectid,$search['Project']['id']); ?>
					<?php endif;//projectid ?>
				<?php endif;//pregmatch,name ?>
	
				<?php if(!preg_match("/$search_str/",$search['Project']['project_name'])):?>
					<?php if(preg_match("/$search_str/",$search['Project']['detail_text'])):?>
					<?php if(!($search['Project']['id'] == $proid)): ?>
					
		<li>
			<div class="background"><?php echo $this->Html->image('common/project/orange.png'); ?></div>
			<div class="thumb"><?php echo $this->Html->link($this->Html->image("projects/".$search['Project']['image_file_name']),'/projects/detail/'.$new['Project']['id'],array('escape'=>false));?></div>
			<div class="text">残り席</div>
			<div class="seat_number"><?php
								$rest = $search['Project']['people_maxnum']-count($search['projectJoiner']);
								echo h($rest);
								?>
			</div>
			<div class="title"><?php echo h($search['Project']['project_name']); ?></div>
			<div class="date"><?php echo h($search['Project']['created']); ?></div>
		</li>
					<?php $proid = $search['Project']['id']; ?>
	<?php endif;//!pregmastch,text ?>
	<?php endif;//pregmatch,detail ?>
	<?php endif;//projectid ?>
	
	<?php endforeach;//search_strs ?>
	<?php endforeach; //searches?>
	<?php endif;//!empty ?>
	
	<?php if(empty($_REQUEST['search_text'])): ?>
	<?php foreach($news as $new): ?>
		<li>
			<div class="background"><?php echo $this->Html->image('common/project/orange.png'); ?></div>
			<div class="thumb"><?php echo $this->Html->link($this->Html->image("projects/".$new['Project']['image_file_name'],array('height'=>'200')),'/projects/detail/'.$new['Project']['id'],array('escape'=>false));?></div>
			<div class="text">残り席</div>
			<div class="seat_number"><?php
								$rest = $new['Project']['people_maxnum']-count($new['projectJoiner']);
								echo h($rest);
								?>
			</div>
			<div class="title"><?php echo h($new['Project']['project_name']); ?></div>
			<div class="date"><?php echo h($new['Project']['created']); ?></div>
		</li>
	<?php endforeach; ?>
	<?php endif; ?>
			


<?php /**
<div id="search_result_bottom" class="clearfix">
	<ul class="clearfix">
		<li><a href="#" title="前へ"><img src="./images/common/list_left.jpg" alt="前へ" height="30" /></a></li>
		<li class="middle"><span>1</span></li>
		<li class="middle"><a href="#" title="">2</a></li>
		<li class="middle"><a href="#" title="">3</a></li>
		<li><a href="#" title="次へ"><img src="./images/common/list_right.jpg" alt="次へ" height="30" /></a></li>
	</ul>
</div><!-- end search_result_bottom -->
*/ ?>



