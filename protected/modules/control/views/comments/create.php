<?php
/* @var $this ContentController */
/* @var $model Content */

$this->menu=array(
	array('label'=>'Управление комментариями', 'url'=>array('Index')),
);
?>

<h4>Создать страницу</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>