<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main_bst'); ?>
<div class="row">

	<div id="content2" class="col-lg-8">
		<?php echo $content; ?>
	</div><!-- content -->

	<div class="col-lg-4">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
	</div>
</div>



<?php $this->endContent(); ?>