<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Создать категорию', 'url'=>array('create')),
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

<h4>Управление категориями</h4>

<p class="success">

<?php
        if(Yii::app()->user->hasFlash('success')):
        echo Yii::app()->user->getFlash('success'); 
        endif;
?>
</p>
<div>
<?php /*$my_data = array(
    array(
        'text'     => 'Node 1',
        'expanded' => true, // будет развернута ветка или нет (по умолчанию)
            'children' => array(
                 array(
                    'text'     => '<a href="/">Node 1.1</a>',
                    'children' => array(
                 array(
                    'text'     => '<a href="/">Node 1.1</a>',
                 ),   
                 array(
                    'text'     => 'Node 1.2',
                 ),   
                 array(
                    'text'     => 'Node 1.3',
                 ),             
            )
                 ),   
                 array(
                    'text'     => 'Node 1.2',
                 ),   
                 array(
                    'text'     => 'Node 1.3',
                 ),             
            )
    ),
);

$this->widget('CTreeView', array('data' => $my_data));*/?>
</div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'alias_cat',
		'position',
		array(
			'class'=>'CButtonColumn',
			'viewButtonOptions' => array('style' => 'display:none'),
		),
	),
)); ?>

<p><?php echo CHtml::link('Расширенный поиск','#',array('class'=>'btn search-button')); ?></p>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
