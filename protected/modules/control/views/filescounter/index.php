<?php
/* @var $this FilescounterController */

$this->breadcrumbs=array(
	'Filescounter',
);
?>
<h4>Статистика скачки файлов</h4>
<?php

	$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$filescounter['dataProvider'],
    'itemView'=>'_filescounter_list',
    'summaryText'=>'Просмотры {start} по {end} из {count}', 
    'sortableAttributes'=>array(
         'id',
         'date',
    ),
));
	
?>
