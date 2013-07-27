<?php

class ProductsController extends Controller
{

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
				'actions'=>array('index','delete', 'create','update', 'xml'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('@'),
			),
		);
	}

    public function actionXml() {

        $cat = ($_REQUEST['category']) ? (int)$_REQUEST['category'] : '';

        $criteria=new CDbCriteria;
        $criteria->compare('category_id',$cat);
        $post=Products::model()->findAll($criteria);
        $array[0] = array(
            'id' => 'ID',
            'title' => 'наименование',
            'link' => 'ссылка',
            'introtext' => 'описание',
            'price' => 'цена',
            'count' => 'количество',
            're' => 're',
        );
        foreach ($post as $item) {
            $array[] = array(
                'id' => $item->id,
                'title' => $item->title,
                'link' => $item->link,
                'introtext' => $item->introtext,
                'price' => $item->price,
                'count' => $item->count,
                're' => $item->re,
            );
        }

        Yii::import('application.extensions.phpexcel.JPhpExcel');
        $xls = new JPhpExcel('UTF-8', false, 'My orders');

        $cat_array = Category::model()->findByPk($cat);

        $cat_name = ($cat_array->title) ? $cat_array->alias_cat : 'all';

        $xls->addArray($array);
        $xls->generateXML('orders-'.$cat_name);
    }


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Products;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			if($model->created == '' or !strtotime($model->created)) $model->created = time();
			else $model->created = strtotime($model->created);
			if($model->save()){
				Yii::app()->user->setFlash('success',"Страница успешно создана");
				$this->redirect(array('index','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			$model->created = strtotime($model->created);
			if($model->save()){
				Yii::app()->user->setFlash('success',"Изменения внесены успешно");
				$this->redirect(array('index','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Products('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Content the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Products::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Content $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='content-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
