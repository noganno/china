<?php
/* @var $this ContentController */
/* @var $model Content */


$this->menu=array(
	array('label'=>'Создать продукт', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form input[type=submit]').addClass('btn btn-info').attr('value', 'Поиск');
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<h4>Управление продуктами</h4>

<p class="success">
<?php if(Yii::app()->user->hasFlash('success')):
        echo Yii::app()->user->getFlash('success'); 
endif; ?>
</p>
<?php $cat = ($_GET['category']) ? '?category='.(int)$_GET['category'] : ''; ?>
<p><?php echo CHtml::link('Создать Excel этой категории','/control/content/xml'.$cat,array('class'=>'xml', 'target' => '_blank')); ?></p>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'content-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title'=>array(
			"name" => "title",
			"value" => 'htmlspecialchars($data->title)',
			),
		'icon' =>array(
			"name" => "icon",
			"value" => '',
			),
		'status' =>  array(
			"name" => "status",
			"value" => '($data->status == 1)?"Опубликована":"Не опубликована"',
			"filter" => array(0 => "Не опубликована", 1 => "Опубликована")
		),
		'category_id' => array(
			"name" => "category_id",
			"value" => '$data->category->title',
			"filter" => CategoryProducts::getAllCategories()
			),
		'created'  => array(
			"name" => "created",
			"value" => 'date("j-m-Y H:i", $data->created)',
			"filter" => false
			),
		array(
			'class'=>'CButtonColumn',
			'viewButtonOptions' => array('style' => 'display:none'),
		),
	),
)); ?>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
