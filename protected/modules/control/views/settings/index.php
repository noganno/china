<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->menu=array(
	array('label'=>'Создать параметр', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#settings-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h4>Управление настройками</h4>
<p>Массив с настройками сайта доступен через $this->aSettings[{param}]</p>
<p class="success">
<?php
	if(Yii::app()->user->hasFlash('success')):
	        echo Yii::app()->user->getFlash('success'); 
	endif; 
?>
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'settings-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'option_name',
		'option_value',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
