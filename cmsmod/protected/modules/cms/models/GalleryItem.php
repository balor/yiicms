<?php

class GalleryItem extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'GalleryItem':
	 * @var integer $id
	 * @var string $title
	 * @var string $author
	 * @var string $image_path
	 * @var string $image_dimensions
	 * @var integer $image_size
	 * @var string $image_filename
	 * @var integer $created
	 */

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
		return 'GalleryItem';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, image_path, image_filename, created', 'required'),
			array('image_size, created', 'numerical', 'integerOnly'=>true),
			array('title, author, image_path, image_filename', 'length', 'max'=>255),
			array('image_dimensions', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, author, image_path, image_dimensions, image_size, image_filename, created', 'safe', 'on'=>'search'),
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
			'title' => 'Tytuł',
			'author' => 'Autor',
			'image_path' => 'Ścieżka do obrazu',
			'image_dimensions' => 'Rozmiar obrazu',
			'image_size' => 'Waga obrazu',
			'image_filename' => 'Nazwa pliku obrazu',
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

		$criteria->compare('title',$this->title,true);

		$criteria->compare('author',$this->author,true);

		$criteria->compare('image_path',$this->image_path,true);

		$criteria->compare('image_dimensions',$this->image_dimensions,true);

		$criteria->compare('image_size',$this->image_size);

		$criteria->compare('image_filename',$this->image_filename,true);

		$criteria->compare('created',$this->created);

		return new CActiveDataProvider('GalleryItem', array(
			'criteria'=>$criteria,
		));
	}
}
