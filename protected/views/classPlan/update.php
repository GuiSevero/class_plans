<?php
/* @var $this ClassPlanController */
/* @var $model ClassPlan */

$this->breadcrumbs=array(
	'Aulas'=>array('index'),
	$model->title=>array('view','id'=>$model->title),
	'Editar',
);

$this->menu=array(
	array('label'=>'List ClassPlan', 'url'=>array('index')),
	array('label'=>'Create ClassPlan', 'url'=>array('create')),
	array('label'=>'View ClassPlan', 'url'=>array('view', 'id'=>$model->id_class)),
	array('label'=>'Manage ClassPlan', 'url'=>array('admin')),
);
?>

<h3><?php echo $model->title; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>