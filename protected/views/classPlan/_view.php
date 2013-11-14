<?php
/* @var $this ClassPlanController */
/* @var $data ClassPlan */
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id_class)); ?>
    	<small class="pull-right"><?php echo CHtml::link(CHtml::encode($data->owner->full_name), array('/user/view', 'id'=>$data->id_owner)); ?></small></h3>
  </div>
  <div class="panel-body">
    <?php echo $data->objectives; ?>
    <?php foreach (explode(' ', $data->tags) as $tag):?> 
  		<small><?php if($tag != '') echo CHtml::link($tag, array('/classPlan/tag', 'tag'=>$tag), array('class'=>'btn btn-info btn-xs')); ?></small>
  	<?php endforeach;?>
  </div>

  <?php if($data->id_owner == Yii::app()->user->getId()): ?>
  <div class="panel-footer">
  	<?php echo CHtml::link('Editar', array('/classPlan/update', 'id'=>$data->id_class), array('class'=>'btn btn-primary')); ?>
			<?php echo CHtml::link("Excluir",'#', array(
					'submit'=>array('/classPlan/delete', 'id'=>$data->id_class),
					'confirm'=>"Você deseja deletar este plano?",
					'class'=>'btn btn-danger',
					'title'=>'Excluir'
					
				))?>
  </div>
  <?php endif; ?>

</div>


<?php
/* 
<div class="view">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_class')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_class), array('view', 'id'=>$data->id_class)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objectives')); ?>:</b>
	
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contents')); ?>:</b>
	<?php echo CHtml::encode($data->contents); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resources')); ?>:</b>
	<?php echo CHtml::encode($data->resources); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evaluation')); ?>:</b>
	<?php echo CHtml::encode($data->evaluation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sobek_keywords')); ?>:</b>
	<?php echo CHtml::encode($data->sobek_keywords); ?>
	<br />

	<?php
	<b><?php echo CHtml::encode($data->getAttributeLabel('tags')); ?>:</b>
	<?php echo CHtml::encode($data->tags); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('released')); ?>:</b>
	<?php echo CHtml::encode($data->released); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_owner')); ?>:</b>
	<?php echo CHtml::encode($data->id_owner); ?>
	<br />


</div>

	*/ ?>