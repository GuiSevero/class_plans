<?php
/* @var $this UserController */
/* @var $data User */
?>
<tr>
	<td><?php echo CHtml::link(CHtml::encode($data->full_name), array('view', 'id'=>$data->id_user)); ?></td>
</tr> 