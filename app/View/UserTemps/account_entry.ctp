<!-- ���C���R���e���c�͂�������ҏW���Ă��������I�I�I�I  -->

<div id="account_container">
<?php $this->Form->create(array('inputDefaults'=>array('label'=>false,'div'=>false))) ?>
<FORM METHOD="POST">
�@
	<h1>Waninaru���g���Ă݂悤�I</h1><br/>


	<h2><span>�w�Дԍ�����͂��Ă��������B</span></h2>
	<div class="account_form">ne<!--<?php echo $this->Form->input('Student_Number',array('type'=>'text','size'=>'7')); ?> -->
			<input type="text" size = "7" name="Student_Number" />  @senshu-u.jp</div>

			<div class="supplement">
				���၄ne23-0000A����̏ꍇ<br />
				<!-- <?php echo $this->Form->input('aaaa',array('type'=>'text','size'=>'7', 'value' => '230000')); ?> -->
				"ne<input type="text" disabled=�hdisabled�h name="�w�Дԍ�" size="7" value=" 230000"�@/>@senshu-u.jp"
				�Ɠ��͂��Ă��������B
			</div><!-- end supplement -->


		<div class="contents1">
		    <div class="btn_base">
		    
				<p><?php echo $this->Form->button('�V�K�o�^',array('class'=>'btn blue')); ?></p>
				
			</div>
		</div><!-- end contents1 -->
			<div class="supplement">
				���o�^��p��URL����C��w��Gmail�ɑ��M����܂��B
			</div><!-- end supplement -->

<?php $this->Form->end() ?>
</div><!-- end main_container -->


<!-- �ҏW�����܂�  -->
