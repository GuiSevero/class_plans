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
    <?php echo $data->description; ?>
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