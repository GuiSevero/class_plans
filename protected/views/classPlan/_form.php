<?php
/* @var $this ClassPlanController */
/* @var $model ClassPlan */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl .'/js/jquery.tokeninput.js');
Yii::app()->clientScript->registerScriptFile('https://www.google.com/jsapi');
Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl .'/css/tokeninput/token-input.css');
Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl .'/css/tokeninput/token-input-facebook.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/js/tinymce/tinymce.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/js/sobek.js');

$url_tokens = Yii::app()->createUrl('/site/tokens');
$url_new_token = Yii::app()->createUrl('/site/addToken');
Yii::app()->clientScript->registerScript('text-areas',"

	var population = $('#ClassPlan_tags').val().split(' ');

	if($('#ClassPlan_tags').val() == '')
		population = null;

	var prePop = Array();
	for( i in population){
		prePop.push({
			id: null,
			name: population[i]
		});
	}

	$('#ClassPlan_tags').tokenInput('{$url_tokens}',{
			searchingText: 'Buscando'
		,	hintText: 'Digite um nome'
		,	noResultsText: 'Resultado não encontrado - Pressione \'Enter\' ou \'Tab\' para adiconá-lo'
		,	theme:'facebook'
		,	preventDuplicates: true
		,	allowFreeTagging: true
		,	prePopulate: (prePop.length > 0) ? prePop : null
		,	tokenValue: 'name'
		,	tokenDelimiter: ' '
		,	onFreeTaggingAdd: function(item){
				$.post('{$url_new_token}',{token:item});
				return item;
			},

	});
");


?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'class-plan-form',
	'enableAjaxValidation'=>false,
	'errorMessageCssClass'=>'text-danger',
	'htmlOptions'=>array('class'=>'form-horizontal', 'role'=>'form'),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php
		 $header = "<div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
		 $footer = "</div>";
		//echo $form->errorSummary($model, $header, $footer); 
	?>
<div class="row">
<div class="col-sm-8">

	<div class="form-group">
		<?php echo $form->labelEx($model,'title', array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'title', array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'title'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tags', array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
			<?php echo $form->textField($model,'tags', array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'tags'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'released', array('class'=>'col-sm-2 control-label')	); ?>
		<div class="col-sm-10">
			<?php echo $form->checkBox($model,'released'); ?>
			<?php echo $form->error($model,'released'); ?>
		</div>
	</div>

	<!-- Nav tabs -->
	<ul class="nav nav-tabs" style="margin-bottom: 10px;">
	  <li class="active"><a href="#objetivos" data-toggle="tab">Objetivos</a></li>
	  <li><a href="#conteudo" data-toggle="tab">Conteúdo</a></li>
	  <li><a href="#recursos" data-toggle="tab">Recursos</a></li>
	  <li><a href="#avaliacao" data-toggle="tab">Avaliação</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
	  <div class="tab-pane active" id="objetivos">
  		<div class="form-group">
			<?php echo $form->textArea($model,'objectives',array('rows'=>20, 'cols'=>50, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'objectives'); ?>
		</div>
	  </div>
	  <div class="tab-pane" id="conteudo">
		  	<div class="form-group">
		<?php echo $form->textArea($model,'contents',array('rows'=>20, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'contents'); ?>
	</div>
	  </div>
	  <div class="tab-pane" id="recursos">
	  	<div class="form-group">
		<?php echo $form->textArea($model,'resources',array('rows'=>20, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'resources'); ?>
	</div>
	  </div>
	  <div class="tab-pane" id="avaliacao">
		<div class="form-group">
			<?php echo $form->textArea($model,'evaluation',array('rows'=>20, 'cols'=>50, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'evaluation'); ?>
		</div>
	  </div>
	</div> <!-- /tab -->

<div class="form-group">
		<div class="col-sm-12">
			<?php echo $form->hiddenField($model,'sobek_keywords',array('rows'=>20, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Adicionar' : 'Salvar', array('class'=>'btn btn-default pull-right')); ?>
		</div>
	</div>

</div>
<div class="col-sm-4">
	<div id="searchcontrol"></div>
</div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->