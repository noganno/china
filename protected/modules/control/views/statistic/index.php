<?php
/* @var $this StatisticController */
?>
<div class="row">
<div class="span2">
<h3>Статистика</h3>

<h4>Статистика с Liveinternet.ru</h4>

<table id="liveinternet">
	<tr><td>Ресурс</td><td><?=$liveinternet['LI_site']?></td></tr>
	<tr><td>Визитов за сегодня</td><td class="liveinternet-value"><?=$liveinternet['LI_today_vis']?></td></tr>
    <tr><td>Просмотров за сегодня</td><td class="liveinternet-value"><?=$liveinternet['LI_today_hit']?></td></tr>
    <tr><td>Визитов за 24 часа</td><td class="liveinternet-value"><?=$liveinternet['LI_day_vis']?></td></tr>
 	<tr><td>Просмотров за 24 часа</td><td class="liveinternet-value"><?=$liveinternet['LI_day_hit']?></td></tr>
 	<tr><td>Визитов за неделю</td><td class="liveinternet-value"><?=$liveinternet['LI_week_vis']?></td></tr>
 	<tr><td>Просмотров за неделю </td><td class="liveinternet-value"><?=$liveinternet['LI_week_hit']?></td></tr>
 	<tr><td>Визитов за месяц</td><td class="liveinternet-value"><?=$liveinternet['LI_month_vis']?></td></tr>
 	<tr><td>Просмотров за месяц</td><td class="liveinternet-value"><?=$liveinternet['LI_month_hit']?></td></tr>
</table>

<p class="btn-pad"><a class='btn btn-white' href='/control/statistic'><i class="icon-repeat"></i>   Обновить</a></p>
</div>
<div class="span9">
<div id="insidestat">
<h4>Внутренняя статистика</h4>
<?php

	$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$insidestatistic['dataProvider'],
    'itemView'=>'_insidestatistic',
    'summaryText'=>'Просмотры {start} по {end} из {count}', 
    'sortableAttributes'=>array(
         'id',
         'date',
    ),
));
	
?>
</div>
</div>
</div>