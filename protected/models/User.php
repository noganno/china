<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $created
 * @property integer $ban
 * @property integer $role
 */
class User extends CActiveRecord
{
    // для капчи
    public $verifyCode;
    private $_identity;
    public $username;
    public $password;
    public $rememberMe;
    // для поля "повтор пароля"
    public $confirm_password;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('created, ban, role', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>50),
			array('password', 'length', 'max'=>100),
            array('password', 'compare', 'compareAttribute'=>'confirm_password', 'on'=>'registration'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, created, ban, role', 'safe', 'on'=>'search'),
            // правило для проверки капчи что капча совпадает с тем что ввел пользователь
            array('verifyCode', 'captcha', 'allowEmpty'=>!extension_loaded('gd')),
            array('username', 'match', 'pattern' => '/^[A-Za-z0-9А-Яа-я\s,]+$/u','message' => 'Логин содержит недопустимые символы.'),
		);
	}

    /**
     * Список атрибутов которые могут быть массово присвоены
     * в любом из наших сценариев
     *
     * @return unknown
     */
    public function safeAttributes()
    {
        return array('login', 'password', 'confirm_password', 'verifyCode', 'ban', 'role');
    }


    /**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Имя пользователя',
			'password' => 'Пароль',
			'created' => 'Создан',
			'ban' => 'Бан',
			'role' => 'Роль',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('ban',$this->ban);
		$criteria->compare('role',$this->role);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getAllUsers()
	{
		$oModel = self::model()->findAll();
		$aResults = array();
		foreach ($oModel as $value) {
			if($value->ban == 0)
				$aResults[$value->username] = $value->password;
		}
		return $aResults;
	}

	public static function getHash($data)
	{
		return md5(sha1($data));
	}

    public function login()
    {
        if($this->_identity===null)
        {
            $this->_identity=new UserIdentity($this->username,$this->password);
            $this->_identity->authenticate();
        }
        if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
        {
            $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
            Yii::app()->user->login($this->_identity,$duration);
            return true;
        }
        else
            return false;
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $this->_identity=new UserIdentity($this->username,$this->password);
            if(!$this->_identity->authenticate())
                $this->addError('password','Incorrect username or password.');
        }
    }
}