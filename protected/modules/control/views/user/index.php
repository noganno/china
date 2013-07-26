<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Создать пользователя', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h4>Управление пользователями</h4>

<p class="success">
<?php if(Yii::app()->user->hasFlash('success')):
        echo Yii::app()->user->getFlash('success'); 
endif; ?>
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'password',
		'created',
		'ban' => array(
			"name" => "ban",
			"value" => '($data->ban == 1)?"Забанен":"Активен"',
			"filter" => array(0 => "Активен", 1 => "Забанен")
			),
		'role' => array(
			"name" => "role",
			"value" => '($data->role == 5)?"Администратор":(($data->role == 3)?"Редактор":"Неопределенная")',
			"filter" => array(5 => "Администратор", 3 => "Редактор")
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