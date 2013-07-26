<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout = '/layouts/column2';// один слеш означает путь относительно папки модуля
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	/**
	 * Displays the login page
	 */
	/**Массив с настройками сайта
	* в видах доступен через $this->aSettings['param']
	*/
	public $aSettings = array();
	
	public function init()
	{
		//Загрузка данных с настройками сайта в массив aSettings
		$model_settings = Settings::model()->findAll();
		$this->aSettings = CHtml::listData($model_settings,'option_name','option_value');
	}
}
