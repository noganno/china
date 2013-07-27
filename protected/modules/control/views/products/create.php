<?php
/* @var $this ContentController */
/* @var $model Content */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Управление страницами', 'url'=>array('Index')),
);
?>

<h4>Создать страницу</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>