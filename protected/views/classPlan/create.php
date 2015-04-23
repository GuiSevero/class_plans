<?php
/* @var $this ClassPlanController */
/* @var $model ClassPlan */

$this->breadcrumbs=array(
	'Aulas'=>array('index'),
	'Criar Aula',
);

$this->menu=array(
	array('label'=>'List ClassPlan', 'url'=>array('index')),
	array('label'=>'Manage ClassPlan', 'url'=>array('admin')),
);
?>

<h3>Criar Aula</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'users'=>$users)); ?>