<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Управление параметрами', 'url'=>array('index')),
);
?>

<h1>Создать параметр</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>