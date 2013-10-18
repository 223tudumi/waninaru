<table>
  <tr>
    <th>名前</th>
	<td>
      <?php echo $xformjp->input('name', array('type' => 'text')); ?>
      <?php echo $xformjp->error('name'); ?>
    </td>
  </tr>
  <tr>
    <th>メールアドレス</th>
    <td>
      <?php echo $xformjp->input('email', array('type' => 'text', 'class' => 'text_l')); ?>
      <?php echo $xformjp->error('email'); ?>
    </td>
  </tr>
  <tr>
    <th>お問い合わせ内容</th>
    <td>
      <?php echo $xformjp->textarea('body', array('rows' => '10', 'cols' => '40')); ?>
      <?php echo $xformjp->error('body'); ?>
    </td>
  </tr>
</table>