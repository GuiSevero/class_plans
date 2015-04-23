<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'htmlOptions'=>array('role'=>'form'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<div class="form-group">
	<?php echo $form->labelEx($model,'username'); ?>
	<?php echo $form->emailField($model,'username', array('type'=>'email','class'=>'form-control', 'type'=>'email', 'placeholder'=>'Digite um nome de usuário')); ?>
	<?php echo $form->error($model,'username'); ?>
  </div>
  <div class="form-group">
    <?php echo $form->labelEx($model,'password'); ?>
	<?php echo $form->passwordField($model,'password', array( 'class'=>'form-control', 'placeholder'=>'Digite uma senha')); ?>
	<?php echo $form->error($model,'password'); ?>
  </div>
  <div class="checkbox rememberMe">
    <?php echo $form->checkBox($model,'rememberMe'); ?>
	<?php echo $form->label($model,'rememberMe'); ?>
	<?php echo $form->error($model,'rememberMe'); ?>
  </div>
  <?php echo CHtml::link('Cadastre-se', array('/user/create'), array('class'=>'btn btn-default')); ?>
  <?php echo CHtml::submitButton('Entrar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>
</div><!-- form -->



<form role="form">


</form>