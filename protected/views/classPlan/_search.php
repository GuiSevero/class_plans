<?php
/* @var $this ClassPlanController */
/* @var $model ClassPlan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_class'); ?>
		<?php echo $form->textField($model,'id_class'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objectives'); ?>
		<?php echo $form->textArea($model,'objectives',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contents'); ?>
		<?php echo $form->textArea($model,'contents',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resources'); ?>
		<?php echo $form->textArea($model,'resources',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'evaluation'); ?>
		<?php echo $form->textArea($model,'evaluation',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sobek_keywords'); ?>
		<?php echo $form->textArea($model,'sobek_keywords',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tags'); ?>
		<?php echo $form->textField($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'released'); ?>
		<?php echo $form->checkBox($model,'released'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_owner'); ?>
		<?php echo $form->textField($model,'id_owner'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->