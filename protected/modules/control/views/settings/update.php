<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Управление параметрами', 'url'=>array('index')),
);
?>

<h4>Редактирование параметра <?php echo $model->id; ?></h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>