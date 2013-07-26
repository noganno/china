<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Управление пользователями', 'url'=>array('index')),
);
?>

<h4>Редактирование пользователя <span class="bold"><?php echo $model->username;?></span></h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>