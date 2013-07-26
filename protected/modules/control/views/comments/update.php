<?php
/* @var $this CommentsController */
/* @var $model Comments */


$this->menu=array(
	array('label'=>'Управление комментариями', 'url'=>array('index')),
);
?>

<h4>Изменить комментарий <?php echo $model->id; ?></h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>