<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/login_l'); ?>
<div class="span9">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span3">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Операции',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
			'itemTemplate' => '<span class="btn btn-block btn-info">{menu}</span>',
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>