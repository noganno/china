<?php

/**
 * This is the model class for table "{{comments}}".
 *
 * The followings are the available columns in table '{{comments}}':
 * @property integer $id
 * @property string $content
 * @property integer $material_id
 * @property integer $created
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_email
 */
class Comments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comments the static model class
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
		return '{{comments}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, user_name', 'required'),
			array('user_email', 'email'),
			array('user_website', 'default'),
			array('material_id, created, user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, content, material_id, created, user_id', 'safe', 'on'=>'search'),
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
			"material" => array(self::BELONGS_TO, 'Content', 'material_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content' => 'Комментарий',
			'material_id' => 'Тема',
			'created' => 'Создан',
			'user_id' => 'идентификатор',
			'user_name' => 'Ваше имя',
			'user_email' => 'Email',
			'user_website' => 'Сайт',
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
		$criteria->compare('content',$this->content,true);
		$criteria->compare('material_id',$this->material_id);
		$criteria->compare('created',$this->created);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_name',$this->user_name);
		$criteria->compare('user_email',$this->user_email);
		$criteria->compare('user_website',$this->user_website);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}