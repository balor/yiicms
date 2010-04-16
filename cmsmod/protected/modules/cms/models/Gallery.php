<?php

class Gallery extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Gallery':
	 * @var integer $id
	 * @var string $name
	 * @var string $icon_path
	 * @var integer $created
	 */

    // uploaded image
    public $image;

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
		return 'Gallery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('created', 'numerical', 'integerOnly'=>true),
			array('name, icon_path', 'length', 'max'=>255),
            array('image', 'file', 'types'=>'jpg, gif, png'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, icon_path, created', 'safe', 'on'=>'search'),
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
			'id' => 'Nr porządkowy',
			'name' => 'Nazwa galerii',
            'image' => 'Ikona galerii',
			'icon_path' => 'Ikona galerii',
			'created' => 'Utworzono',
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('icon_path',$this->icon_path,true);

		$criteria->compare('created',$this->created);

		return new CActiveDataProvider('Gallery', array(
			'criteria'=>$criteria,
		));
	}
}
