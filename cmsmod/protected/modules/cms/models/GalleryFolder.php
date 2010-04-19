<?php

class GalleryFolder extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'GalleryFolder':
	 * @var integer $id
	 * @var string $name
	 * @var integer $gallery_id
	 * @var string $icon
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
		return 'GalleryFolder';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, gallery_id, icon, created', 'required'),
			array('gallery_id, created', 'numerical', 'integerOnly'=>true),
			array('name, icon', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, gallery_id, icon, created', 'safe', 'on'=>'search'),
            array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true),
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
			'id' => 'Nr',
			'name' => 'Nazwa kategorii',
			'gallery_id' => 'Gallery',
			'icon' => 'Ikona',
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

		$criteria->compare('gallery_id',$this->gallery_id);

		$criteria->compare('icon',$this->icon,true);

		$criteria->compare('created',$this->created);

		return new CActiveDataProvider('GalleryFolder', array(
			'criteria'=>$criteria,
		));
	}
}
