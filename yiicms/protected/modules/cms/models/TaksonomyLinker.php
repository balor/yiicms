<?php

class TaksonomyLinker extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'TaksonomyLinker':
	 * @var integer $id
	 * @var integer $taksonomy_id
	 * @var integer $content_id
	 */

    private $category;

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
		return 'TaksonomyLinker';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('taksonomy_id, content_id', 'required'),
			array('taksonomy_id, content_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, taksonomy_id, content_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
            'content'=>array(
                self::BELONGS_TO,
                'Content',
                'content_id',
            )
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Nr',
			'taksonomy_id' => 'Kategoria',
			'content_id' => 'Zawartość',
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

		$criteria->compare('taksonomy_id',$this->taksonomy_id);

		$criteria->compare('content_id',$this->content_id);

		return new CActiveDataProvider('TaksonomyLinker', array(
			'criteria'=>$criteria,
		));
	}

    public function getCategory()
    {
        if (!$this->category)
            $this->category = Taksonomy::model()->findByPk($this->taksonomy_id);
        return $this->category;
    }

    public function getAllCategories()
    {
        $allCategories = Taksonomy::model()->findAll();
        $content = $this->content;
        $contentCategories = $content->getContaingingCategories();
        $categories = array();
        foreach ($allCategories as $category) {
            $validCategory = true;
            foreach ($contentCategories as $contentCategory) {
                if ($contentCategory->taksonomy_id == $category->id) {
                    $validCategory = false;
                }
            }
            if ($validCategory)
                $categories[$category->id] = $category->name;
        }
        return $categories;
    }
}
