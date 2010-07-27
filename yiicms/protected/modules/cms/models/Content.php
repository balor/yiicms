<?php

class Content extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Content':
	 * @var integer $id
	 * @var integer $name
	 * @var string $html
	 * @var string $author
	 * @var integer $created
	 * @var integer $modified
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
		return 'Content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('html, author, created, modified', 'required'),
			array('created, modified', 'numerical', 'integerOnly'=>true),
			array('author, name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, html, author, created, modified', 'safe', 'on'=>'search'),
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
			'id' => 'Numer porządkowy',
            'name' => 'Nazwa zasobu',
			'html' => 'Zawartość',
			'author' => 'Autor',
			'created' => 'Utworzono',
			'modified' => 'Zmodyfikowano',
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

		$criteria->compare('html',$this->html,true);

		$criteria->compare('author',$this->author,true);

		$criteria->compare('created',$this->created);

		$criteria->compare('modified',$this->modified);

		return new CActiveDataProvider('Content', array(
			'criteria'=>$criteria,
		));
	}

    protected function beforeDelete()
    {
        if (!parent::beforeDelete())
            return false;

        $links = $this->getContaingingCategories();
        foreach ($links as $link) {
            $link->delete();
        }

        return true;
    }

    public function getContaingingCategories()
    {
        return TaksonomyLinker::model()->findAll('content_id = '.$this->id);
    }
}
