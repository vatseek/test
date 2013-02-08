<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $user_id
 * @property string $login
 * @property string $password
 * @property string $firstname
 * @property string $lastname
 * @property string $ip
 * @property string $hash
 * @property string $login_date
 * @property string $create_date
 */
class User extends CActiveRecord
{
    public $repeat_password = NULL;
    public $verifyCode = NULL;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, password, firstname, lastname, repeat_password', 'required'),
			array('login, firstname, lastname', 'length', 'max'=>50),
            array('password, repeat_password', 'length', 'min'=>6, 'max'=>40),
            array('password', 'compare', 'compareAttribute'=>'repeat_password'),
			array('ip', 'length', 'max'=>16),
			array('login_date, create_date', 'length', 'max'=>11),
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('user_id, login, password, firstname, lastname, ip, hash, login_date, create_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'login' => 'Login',
			'password' => 'Password',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'ip' => 'Ip',
			'hash' => 'Hash',
			'thumb' => 'Thumb',
			'login_date' => 'Login Date',
			'create_date' => 'Create Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('hash',$this->hash,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('login_date',$this->login_date,true);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function validatePassword($password)
    {
        return $this->hashPassword($password)===$this->password;
    }

    public function hashPassword($password)
    {
        return md5($password);
    }
}
