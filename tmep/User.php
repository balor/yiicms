<?php

class User extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'User':
	 * @var integer $id
	 * @var string $email
	 * @var string $password
	 * @var integer $last_login_time
	 * @var integer $registration_time
	 */

    public $password_rep;

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
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
		return 'User';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('email', 'unique'),
            array('email', 'email'),
            array('password', 'compare', 'compareAttribute'=>'password_rep'),
			array('email, password, password_rep, last_login_time, registration_time', 'required'),
			array('last_login_time, registration_time', 'numerical', 'integerOnly'=>true),
			array('email, password, password_rep', 'length', 'max'=>124),
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
			'id' => 'Id',
			'email' => 'Email',
			'password' => 'Hasło',
            'password_rep' => 'Potwierdź hasło',
			'last_login_time' => 'Last Login Time',
			'registration_time' => 'Registration Time',
		);
	}

    public function beforeSave()
    {
        $pass = md5(md5($this->password));
        $this->password = $pass;
        return true;
    }
}
