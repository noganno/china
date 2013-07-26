<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	   <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/css/flat-ui.css" rel="stylesheet">
	 <!-- Load JS =============================-->

	<?php
		//При вызове Jquery.ui автоматом вызывается Jquery, но для наглядности можно и так	
		Yii::app()->clientScript->registerCoreScript('jquery');
		Yii::app()->clientScript->registerCoreScript('jquery.ui');
	?>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/bootstrap-select.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/bootstrap-switch.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/flatui-checkbox.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/flatui-radio.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/jquery.tagsinput.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/jquery.placeholder.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/jquery.stacktable.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/application.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/css/control_module.css" />

</head>

<body>

<div class="container">

	<div class="row">
	<div class="span12">
		<header role="heading">
			<div id="logo"><i class="fui-gear"></i>&nbsp;Панель управления | <?=$this->aSettings['sitename']?>
				<p class="pull-right"><span class="fui-search"></span> <a href="<?php echo Yii::app()->homeUrl;?>" target="_blank">Просмотр сайта</a><br /><span class="fui-user"></span> <?php echo CHtml::link('Выход('.Yii::app()->user->name.')', array('/control/login/logout')); ?> </p></div>
		</header>
	<!-- header -->

	<div id="nav-collapse-01" class="nav-collapse collapse">
		
	</div><!-- mainmenu -->

	<div class="navbar navbar-inverse">
            <div class="navbar-inner">
              <div class="container-menu">
                <div class="nav-collapse collapse" id="nav-collapse-01">
                  <?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
                array('label'=>'Категории', 'url'=>array('/control/category'), 'items' => Category::findAllCat()),
				array('label'=>'Заказы', 'url'=>array('/control/content')),
				array('label'=>'Настройки', 'url'=>array('/control/settings')),
				array('label'=>'Пользователи', 'url'=>array('/control/user')),
				
			),'htmlOptions'=>array('class'=>'nav', 'id' => 'top-menu'),
			'activeCssClass' => 'btn-info',
		)); ?>
                </div><!--/.nav -->
              </div>
            </div>
        </div>

	</div>
	</div>
	<div class="row">
	<?php //Вывод основного контента
	echo $content; ?>
	
	</div>
	<div class="clearfix"></div>
	
	<div class="row">
		<div class="span12">
			<div id="footer" class="span12">
				<p class="copy">Copyright &copy; 2013 by </p>
				<p><span class="fui-chat"></span> Основано на Yii<br />
					<a href="http://www.yiiframework.com/doc/guide/1.1/ru" target="_blank">Документация по фреймворку</a>.
				</p>
			</div><?php //<!-- footer -->?>
		</div>
	</div>
</div><?php //<!-- page --> ?>
 
   
	<script type="text/javascript">
	$('document').ready(function(){
		$('a.update, a.delete, a.view').html('<span></span>');
	});
	</script>
</body>
</html>
