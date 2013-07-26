<?php /* @var $this Controller */ 

  //Массив с айдишниками категорий в которых должен быть особый вывод некоторых блоков
  $special_template_category = array(4,);

  //Массив с айдишниками категорий в которых должны быть комментарии
  $comments_category = array(4,);

?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->aSettings['charset'];?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="<?php echo CHtml::encode($this->pageAttributes['keywords']); ?>" />  
<meta name="description" content="<?php echo CHtml::encode($this->pageAttributes['description']); ?>" />
<meta name="robots" content="index, follow" />
<meta name="author" content="sdevelop" />  
<meta name="robots" content="all" />
<title><?php echo CHtml::encode($this->pageAttributes['title']); ?> | <?php echo $this->aSettings['add_to_title']; ?></title>
   <!-- Loading Bootstrap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/css/flat-ui.css" rel="stylesheet">
    
    <!-- Loading Common styles -->
    <link href="<?php echo $this->aSettings['siteurl']; ?>/themes/default/css/main_styles.css" rel="stylesheet" type="text/css" />
    <?php
        //При вызове Jquery.ui автоматом вызывается Jquery, но так нагляднее  
        Yii::app()->clientScript->registerCoreScript('jquery');
        Yii::app()->clientScript->registerCoreScript('jquery.ui');
    ?>
</head>
<body>
<div class="container">
<div class="row">
<header>
        <div id="icons" class="pull-right"><a href="sitemap.xml" title="Карта сайта"><i class="icon-globe"></i></a>
        <div id="contact_phone"><p id="phone_number"><span class="prefix">(495) </span>99-99-99</p></div>
        </div>
</header>
<div id="mid_header">
<div id="logo"><h2><a href="<?php echo $this->aSettings['siteurl']; ?>" title="Перейти на главную - <?php echo $this->aSettings['sitename']; ?>"><img src="<?php echo $this->aSettings['siteurl']; ?>/themes/flat-ui/images/icons/Retina-Ready@2x.png"  width="64" height="64" alt="<?php echo $this->aSettings['sitename']; ?>"/></a> <span class="sitename"><?php echo $this->aSettings['sitename']; ?></span></h2></div>
<div id="slogan"><h2><?php echo $this->aSettings['slogan']; ?></h2>
</div>
</div>
</div>
<div class="row">
<?php 
    /*
    *
    * Вывод верхнего меню сайта
    *
    */
    echo $this->htmlBlocks['topMenu']; 
?>
</div>
<br class="clearfix" />
<div class="row">
<?php 

    /*
    *
    * Вывод верхних инфо-блоков
    *
    */
    if (!in_array($this->pageAttributes['category_id'],$special_template_category) && $this->pageAttributes['alias'] != 'articles') echo $this->htmlBlocks['topTab'];

?>
</div>
<br class="clearfix" />
<div class="row">
<div class="span9">
<article class="content"<?php if (in_array($this->pageAttributes['category_id'],$special_template_category) or $this->pageAttributes['alias'] == 'articles') echo 'class="big-height"';?>>
<?php 

    /*
    *
    * Вывод главной контентной части
    *
    */
    echo $content; 

?>
</article>
</div>
<div class="span3">
<?php 

    /*
    *
    * Вывод левой панели
    *
    */
    if (!in_array($this->pageAttributes['category_id'],$special_template_category) && $this->pageAttributes['alias'] != 'articles') echo $this->htmlBlocks['leftBlock'];
    else $this->renderPartial('_leftBlockForArticles', null, false);

?>
</div>
</div>
<br class="clearfix" />
<div class="row pre-footer">
<p class="order"><a href="<?php echo $this->aSettings['siteurl']; ?>/site/feedbackform" class="btn btn-primary" rel="nofollow">Задать вопрос</a></p>
</div>
<br class="clearfix" />
<div class="row">
<footer role="contentinfo">
<div class="copyright pull-right">
<?php 
    /*
    *
    * Если сайт просматривается не админом, то выводится код счетчиков
    *
    */
    if(Yii::app()->user->isGuest) echo $this->htmlBlocks['countersBlock'];
    else echo Yii::app()->user->name;
?>
  &nbsp;©&nbsp;2011-2013&nbsp;<?php echo $this->aSettings['company_name'] ?> 
</div>
<br class="clearfix" />
</footer>
</div>
</div> <!--end container-->
<?php 

    /*
    *
    * Вывод кнопок соц.сетей
    *
    */
    echo $this->htmlBlocks['socialBlock'];

?>  
    <!-- Load JS =============================-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/bootstrap-select.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/bootstrap-switch.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/flatui-checkbox.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/flatui-radio.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/jquery.tagsinput.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/jquery.placeholder.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/jquery.stacktable.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/flat-ui/js/application.js"></script>
</body>
</html>
