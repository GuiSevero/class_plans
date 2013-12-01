<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Usuários'=>array('index'),
	$model->full_name,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id_user)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_user),'confirm'=>'Tem certeza que deseja deletar este item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>
	
<h1>
	<?php echo $model->full_name; ?>
	<?php if($model->id_user == Yii::app()->user->getId()): ?>
		<?php echo CHtml::link('Editar', array('/user/update/', 'id'=>$model->id_user), array('class'=>'btn btn-default')); ?>
	<?php endif; ?>
</h1>

<?php if(count($model->classes) < 1): ?>
	<h4> Não há Planos de Aula cadastrados. </h4>
		<?php  if($model->id_user == Yii::app()->user->getId())
					echo CHtml::link('Cadastrar Plano', array('/classPlan/create'), array('class'=>'btn btn-primary')); 
		?>
<?php else:?>
<table class="table table-hover table-striped">
	<thead>
          <tr>
            <th>Plano de Aula</th>
            <th>Publicada</th>
            <th>Marcadores</th>
            <?php if($model->id_user == Yii::app()->user->getId()): ?>
            <th>Menu</th>
            <?php endif; ?>
          </tr>
        </thead>
<?php foreach($model->classes as $cls): ?>
	<tr>
		<td><?php echo CHtml::link($cls->title, array('/classPlan/view', 'id'=>$cls->id_class), array('class'=>'link')); ?></td>
		<td><?php echo ($cls->released) ? 'Sim' : 'Não'; ?></td>
		<td><?php echo CHtml::encode($cls->tags) ?></td>
		<?php if($model->id_user == Yii::app()->user->getId()): ?>
		<td>
			<?php echo CHtml::link('Editar', array('/classPlan/update', 'id'=>$cls->id_class), array('class'=>'btn btn-primary')); ?>
			<?php echo CHtml::link("Excluir",'#', array(
					'submit'=>array('/classPlan/delete', 'id'=>$cls->id_class),
					'confirm'=>"Você deseja deletar este plano?",
					'class'=>'btn btn-danger',
					'title'=>'Excluir'
					
				))?>
		</td>
	<?php endif; ?>
	</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
