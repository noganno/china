<?php
/* @var $this CommentsController */
/* @var $model Comments */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Добавить комментарий', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comments-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h4>Управление комментариями</h4>

<p class="success">
<?php if(Yii::app()->user->hasFlash('success')):
        echo Yii::app()->user->getFlash('success'); 
endif; ?>
</p>

<?php 
	
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comments-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'material_id' =>array(
			"name" => "material_id",
			"value" => '$data->material->title',
			),
		'content',
		'user_name',
		'created' => array(
			"name" => "created",
			"value" => 'date("j-m-Y H:i", $data->created)',
			"filter" => false
			),
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