<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $login
 * @property string $password
 * @property string $mail
 * @property double $skill
 * @property string $date_register
 * @property string $date_activate
 * @property string $date_comment_last
 * @property string $ip_register
 * @property double $rating
 * @property string $count_vote
 * @property integer $activate
 * @property string $activate_key
 * @property string $profile_name
 * @property string $profile_sex
 * @property string $profile_country
 * @property string $profile_region
 * @property string $profile_city
 * @property string $profile_birthday
 * @property string $profile_about
 * @property string $profile_date
 * @property string $profile_avatar
 * @property string $profile_foto
 */
class User extends CActiveRecord
{
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
			array('login, password, mail, date_register, ip_register', 'required'),
			array('activate', 'numerical', 'integerOnly'=>true),
			array('skill, rating', 'numerical'),
			array('login, profile_country, profile_region, profile_city', 'length', 'max'=>30),
			array('password, mail, profile_name', 'length', 'max'=>50),
			array('ip_register', 'length', 'max'=>20),
			array('count_vote', 'length', 'max'=>11),
			array('activate_key', 'length', 'max'=>32),
			array('profile_sex', 'length', 'max'=>5),
			array('profile_avatar, profile_foto', 'length', 'max'=>250),
			array('date_activate, date_comment_last, profile_birthday, profile_about, profile_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, login, password, mail, skill, date_register, date_activate, date_comment_last, ip_register, rating, count_vote, activate, activate_key, profile_name, profile_sex, profile_country, profile_region, profile_city, profile_birthday, profile_about, profile_date, profile_avatar, profile_foto', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'login' => 'Login',
			'password' => 'Password',
			'mail' => 'Mail',
			'skill' => 'Skill',
			'date_register' => 'Date Register',
			'date_activate' => 'Date Activate',
			'date_comment_last' => 'Date Comment Last',
			'ip_register' => 'Ip Register',
			'rating' => 'Rating',
			'count_vote' => 'Count Vote',
			'activate' => 'Activate',
			'activate_key' => 'Activate Key',
			'profile_name' => 'Profile Name',
			'profile_sex' => 'Profile Sex',
			'profile_country' => 'Profile Country',
			'profile_region' => 'Profile Region',
			'profile_city' => 'Profile City',
			'profile_birthday' => 'Profile Birthday',
			'profile_about' => 'Profile About',
			'profile_date' => 'Profile Date',
			'profile_avatar' => 'Profile Avatar',
			'profile_foto' => 'Profile Foto',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('skill',$this->skill);
		$criteria->compare('date_register',$this->date_register,true);
		$criteria->compare('date_activate',$this->date_activate,true);
		$criteria->compare('date_comment_last',$this->date_comment_last,true);
		$criteria->compare('ip_register',$this->ip_register,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('count_vote',$this->count_vote,true);
		$criteria->compare('activate',$this->activate);
		$criteria->compare('activate_key',$this->activate_key,true);
		$criteria->compare('profile_name',$this->profile_name,true);
		$criteria->compare('profile_sex',$this->profile_sex,true);
		$criteria->compare('profile_country',$this->profile_country,true);
		$criteria->compare('profile_region',$this->profile_region,true);
		$criteria->compare('profile_city',$this->profile_city,true);
		$criteria->compare('profile_birthday',$this->profile_birthday,true);
		$criteria->compare('profile_about',$this->profile_about,true);
		$criteria->compare('profile_date',$this->profile_date,true);
		$criteria->compare('profile_avatar',$this->profile_avatar,true);
		$criteria->compare('profile_foto',$this->profile_foto,true);

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
}
