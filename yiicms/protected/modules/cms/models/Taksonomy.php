<?php

class Taksonomy extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Taksonomy':
	 * @var integer $id
	 * @var string $name
	 * @var integer $parent_id
	 */

    public $parent_name;
    private $linkers;
    private $children;

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
		return 'Taksonomy';
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
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, parent_id', 'safe', 'on'=>'search'),
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
			'parent_id' => 'Kategoria nadrzędna',
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

		//$criteria->compare('parent_id',$this->parent_id);

		return new CActiveDataProvider('Taksonomy', array(
			'criteria'=>$criteria,
		));
	}

    public function afterFind()
    {
        $parent = self::model()->findByPk($this->parent_id);
        if ($parent)
            $this->parent_name = $parent->name;
        else
            $this->parent_name = "Kategoria główna";
    }

    public function getLinkers()
    {
        if (!$this->linkers)
            $this->linkers = TaksonomyLinker::model()->findAll(
                'taksonomy_id = '.$this->id);
        return $this->linkers;
    }

    public function getChildren()
    {
        if (!$this->children)
            $this->children = Taksonomy::model()->findAll('parent_id = '.$this->id);

        return $this->children;
    }

    protected function beforeDelete()
    {
        if (!parent::beforeDelete())
            return false;

        $links = $this->getLinkers();
        foreach ($links as $link) {
            $link->delete();
        }

        $children = $this->getChildren();
        foreach ($children as $child) {
            $child->delete();
        }

        return true;
    }
}