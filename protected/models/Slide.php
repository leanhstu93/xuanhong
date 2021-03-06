<?php

/**
 * This is the model class for table "slide".
 *
 * The followings are the available columns in table 'slide':
 * @property integer $id
 * @property string $TieuDe
 * @property string $UrlImage
 * @property string $Link
 * @property integer $SetHome
 * @property integer $Active
 */
class Slide extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'slide';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SetHome, Active,Type', 'numerical', 'integerOnly'=>true),
			array('TieuDe', 'length', 'max'=>100),
			array('UrlImage, Link', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, TieuDe, UrlImage, Link, SetHome, Active', 'safe', 'on'=>'search'),
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
			'slide_lang' => array(self::BELONGS_TO,'SlideLang',array('id'=>'idSlide')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Type' => 'Type',
			'TieuDe' => 'Tieu De',
			'UrlImage' => 'Hình ảnh',
			'Link' => 'Link',
			'SetHome' => 'Set Home',
			'Active' => 'Hiển thị',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('Type',$this->Type);
		$criteria->compare('TieuDe',$this->TieuDe,true);
		$criteria->compare('UrlImage',$this->UrlImage,true);
		$criteria->compare('Link',$this->Link,true);
		$criteria->compare('SetHome',$this->SetHome);
		$criteria->compare('Active',$this->Active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=> array('defaultOrder'=>'t.id desc')
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Slide the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
