<?php

class GalleryImage extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'GalleryImage':
	 * @var integer $id
	 * @var integer $gallery_folder_id
	 * @var string $name
	 * @var string $author
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
		return 'GalleryImage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_folder_id, name, image_filename, created', 'required'),
			array('gallery_folder_id, image_size, created', 'numerical', 'integerOnly'=>true),
			array('name, author, image_filename', 'length', 'max'=>255),
			array('image_dimensions', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, gallery_folder_id, name, author, image_dimensions, image_size, image_filename, created', 'safe', 'on'=>'search'),
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
			'gallery_folder_id' => 'Gallery Folder',
			'name' => 'Name',
			'author' => 'Author',
			'image_dimensions' => 'Image Dimensions',
			'image_size' => 'Image Size',
			'image_filename' => 'Image Filename',
			'created' => 'Created',
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

		$criteria->compare('gallery_folder_id',$this->gallery_folder_id);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('author',$this->author,true);

		$criteria->compare('image_dimensions',$this->image_dimensions,true);

		$criteria->compare('image_size',$this->image_size);

		$criteria->compare('image_filename',$this->image_filename,true);

		$criteria->compare('created',$this->created);

		return new CActiveDataProvider('GalleryImage', array(
			'criteria'=>$criteria,
		));
	}
}