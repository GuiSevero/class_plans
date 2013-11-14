<?php
/* @var $this ClassPlanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aulas',
);

$this->menu=array(
	array('label'=>'Create ClassPlan', 'url'=>array('create')),
	array('label'=>'Manage ClassPlan', 'url'=>array('admin')),
);
?>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
