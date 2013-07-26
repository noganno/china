<?php

/**
 * This is the model class for table "{{content}}".
 *
 * The followings are the available columns in table '{{content}}':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $created
 * @property integer $status
 * @property integer $category_id
 */
class Content extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Content the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{content}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, alias, introtext, status, category_id, count', 'required'),
			array('created, status, category_id', 'numerical', 'integerOnly'=>true),
			array(array('title','alias', 'uri', 'description', 'keywords', 'price' ), 'length', 'max'=>255),
			array(array('link', 'img'), 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, content, alias, created, status, category_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			"category" => array(self::BELONGS_TO, 'Category', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Заголовок',
			'introtext' => 'Аннотация',
			'content' => 'Содержание',
			'alias' => 'Алиас(uri-адрес)',
			'description' => 'Мета-description',
			'keywords' => 'Мета-keywords',
			'uri' => 'Полный адрес',
			'created' => 'Создана',
			'status' => 'Статус',
			'category_id' => 'Категория',
			'link' => 'Ссылка на товар',
			'img' => 'Изображение товара',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('status',$this->status);
        $criteria->order = 'id DESC';
		if($_REQUEST['category']) {
            $criteria->compare('category_id',(int)$_REQUEST['category']);
        } else {
            $criteria->compare('category_id',$this->category_id);
        }

        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria
		));
	}

	public function beforeSave()
	{
		if($this->isNewRecord){
			$this->created = time();
		}
		if(isset($this->category->alias_cat) && !empty($this->category->alias_cat)) 
			if($this->category->alias_cat == '/' && $this->alias !='/'){
				$this->uri = "/".$this->alias;
			}
			elseif($this->alias == '/'){
				$this->uri = '/';
			}
			else{
				$this->uri = "/".$this->category->alias_cat."/".$this->alias;
			}
			
		return parent::beforeSave();

	}

	public static function getAllTitles()
	{
		$model_content = self::model()->findAll();
		$aResuts = CHtml::listData($model_content, 'id', 'title');
		return $aResuts;
	}
}