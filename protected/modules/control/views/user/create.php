<?php
/* @var $this UserController */
/* @var $model User */

$this->menu=array(
	array('label'=>'Управление пользователями', 'url'=>array('index')),
);
?>

<h4>Create User</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>