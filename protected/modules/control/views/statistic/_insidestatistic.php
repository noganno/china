<div class="row stat-row">
<div class="span1">
	<span class="stat_id"><?=$data->id?></span><br />
	<span class="stat_date"><?=date("j-m-Y H:i",$data->date)?></span>
</div>
<div class="span7">
<div class="row">
<div class="span2">
<div class="wrap_stat_ip">
<span class="stat_ip">
<?php
	$data = $this->dataConvert($data->data);
	$geo = $this->locateUserIP($data['ip']);
	echo $geo['ip'];
?>
</span>
<p>Страна: <?=$geo['Country_Name']?></p>
<p>Регион: <?=$geo['Region']?></p>
<p>Город: <?=$geo['City']?></p>
</div>
</div>
<div class="span5">
<div class="stat-more-info">
<p>Страница: <?=$data['uri']?></p>
<p>Источник: <a href="<?php echo isset($data['UrlReferrer'])?$data['UrlReferrer']:"#"; ?>"><?php echo isset($data['UrlReferrer'])?mb_substr($data['UrlReferrer'],0,40):"Закладка"; ?></a></p>
<p class="stat_agent">
Браузер: 
<?php 
	$userAgent = $this->decodeUserAgent($data['userAgent']);
	echo $userAgent['ua_name'];
?>
</p>
<p>ОС: <?=$userAgent['os_name']?></p>
</div>
</div>
</div>

<?php

/*Array
(
    [typ] => Browser
    [ua_family] => Chrome
    [ua_name] => Chrome 28.0.1500.71
    [ua_version] => 28.0.1500.71
    [ua_url] => http://www.google.com/chrome
    [ua_company] => Google Inc.
    [ua_company_url] => http://www.google.com/
    [ua_icon] => chrome.png
    [ua_info_url] => http://user-agent-string.info/list-of-ua/browser-detail?browser=Chrome
    [os_family] => OS X
    [os_name] => OS X 10.6 Snow Leopard
    [os_url] => http://www.apple.com/osx/
    [os_company] => Apple Computer, Inc.
    [os_company_url] => http://www.apple.com/
    [os_icon] => macosx.png
)
*/
?>
</div>
</div>