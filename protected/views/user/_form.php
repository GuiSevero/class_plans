<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'errorMessageCssClass'=>'text-danger',
	'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form'),	
)); ?>
	
	<?php
		 $header = "<div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
		 $footer = "</div>";
		//echo $form->errorSummary($model, $header, $footer); 
	?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name', array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'name', array('class'=>'form-control')); ?>
			<span class="help-block"><?php echo $form->error($model,'name'); ?></span>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'last_name', array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'last_name', array('class'=>'form-control')); ?>
			<span class="help-block"><?php echo $form->error($model,'last_name'); ?></span>
		</div>
		
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email', array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->emailField($model,'email', array('type'=>'email','class'=>'form-control')); ?>
			<span class="help-block"><?php echo $form->error($model,'email'); ?></span>
		</div>
		
	</div>
	<?php if($model->isNewRecord): ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'password', array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32, 'class'=>'form-control')); ?>
			<span class="help-block"><?php echo $form->error($model,'password'); ?></span>
		</div>
		
	</div>
	<?php endif; ?>

	 <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <?php echo CHtml::submitButton($model->isNewRecord ? 'Adicionar' : 'Salvar', array('class'=>'btn btn-default')); ?>
	    </div>
  	</div>

<?php $this->endWidget(); ?>

