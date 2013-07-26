<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
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
			'itemTemplate' => '<span class="item-action">{menu}</span>',
			'itemCssClass' => 'btn btn-block btn-info',
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>