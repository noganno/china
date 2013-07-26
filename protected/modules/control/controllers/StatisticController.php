<?php
	/**
	 * Контроллер статистики
	 * 
	 */
class StatisticController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','delete', 'create','update'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$aResponseContent['liveinternet'] = $this->getLiveinternetStatistic();
		$criteria = new CDbCriteria();
		$criteria->order = 'date DESC';
		$aResponseContent['insidestatistic']['dataProvider'] = new CActiveDataProvider('Statistic',array(
																			'criteria' => $criteria,
																		));
		$this->render('index', $aResponseContent);
	}

	/**
	 * Конвертирует JSON
	 * 
	 * @return массив с результатом
	 */
	public function dataConvert($data)
	{
		return CJSON::decode($data);
	}

	/**
	 * Преобразование UserAgent
	 * 
	 * @return массив с результатом
	 */
	public function decodeUserAgent($userAgent)
	{
		$aResponse = array(
            'ua_name' => '',
            'os_name' => '',
		);
    /*$parser = new UASparser($userAgent);
    $parser->SetCacheDir(dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/assets/cache/");
    // Gets information about the current browser's user agent
    $aResponse = $parser->Parse($userAgent);
    unset($parser);*/
		return $aResponse;
	}

	/**
	 * Геолокация на основе IP
	 * 
	 * @return массив с результатом
	 */
	public function locateUserIP($ip)
	{
		$aResponse = array();
		Yii::import('ext.EGeoIP');
		$geoIp = new EGeoIP();
		$geoIp->locate($ip); // use your IP
		$aResponse['ip'] = $geoIp->ip;
		$aResponse['City'] = $geoIp->city;
		$aResponse['Region'] = $geoIp->region;
		$aResponse['Country_Name'] = $geoIp->countryName;
		return $aResponse;
	}

	/**
	 * Берет статистику с Liveinternet.ru
	 * 
	 * @return массив с результатом
	 */
	protected function getLiveinternetStatistic()
	{
		//На случай если придет ошибка
		$aResponseContent = array(
				'LI_site' => '',
				'LI_today_vis' => '',
				'LI_today_hit' => '',
				'LI_day_vis' => '',
				'LI_day_hit' => '',
				'LI_week_vis' => '',
				'LI_week_hit' => '',
				'LI_month_vis' => '',
				'LI_month_hit' => '',
				);
		$response = file_get_contents('http://counter.yadro.ru/values?site='.$this->aSettings['siteurl']);
		if($response) $aResponse = explode(';', $response);
		foreach ($aResponse as $one)
		{
			$aOne = explode('=', str_replace("'", "", $one));
			$aOne[0] = trim($aOne[0]);
			if(isset($aOne[1])) $aOne[1] = trim($aOne[1]);
			else $aOne[1] = '';
			if($aOne[0] != '' && $aOne[1] != '') $aResponseContent[$aOne[0]] = $aOne[1];
		}
		return $aResponseContent;
	}
	// Uncomment the following methods and override them if needed
	/*

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}