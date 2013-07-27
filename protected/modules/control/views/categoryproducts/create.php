<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Управление категориями', 'url'=>array('index')),
);
?>

<h4>Создать категорию</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>