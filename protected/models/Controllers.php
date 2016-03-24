<?php

/**
 * This is the model class for table "controllers".
 *
 * The followings are the available columns in table 'controllers':
 * @property integer $id
 * @property string $controller_nam
 * @property string $controller_url
 * @property integer $module_id
 *
 * The followings are the available model relations:
 * @property Actions[] $actions
 * @property Modules $module
 */
class Controllers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'controllers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('module_id', 'numerical', 'integerOnly'=>true),
			array('controller_nam, controller_url', 'length', 'max'=>254),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, controller_nam, controller_url, module_id', 'safe', 'on'=>'search'),
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
			'actions' => array(self::HAS_MANY, 'Actions', 'controller_id'),
			'module' => array(self::BELONGS_TO, 'Modules', 'module_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'controller_nam' => 'Controller Nam',
			'controller_url' => 'Controller Url',
			'module_id' => 'Module',
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
		$criteria->compare('controller_nam',$this->controller_nam,true);
		$criteria->compare('controller_url',$this->controller_url,true);
		$criteria->compare('module_id',$this->module_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Controllers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
