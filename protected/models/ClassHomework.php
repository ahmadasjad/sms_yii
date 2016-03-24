<?php

/**
 * This is the model class for table "class_homework".
 *
 * The followings are the available columns in table 'class_homework':
 * @property integer $id
 * @property integer $batch_id
 * @property integer $employee_id
 * @property integer $subject_id
 * @property string $homework_title
 * @property string $homework_description
 *
 * The followings are the available model relations:
 * @property Batches $batch
 * @property Employees $employee
 * @property Subjects $subject
 */
class ClassHomework extends CActiveRecord {
    public $employee_search;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'class_homework';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('batch_id, employee_id, subject_id', 'numerical', 'integerOnly' => true),
            array('homework_title', 'length', 'max' => 254),
            array('homework_description', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, batch_id, employee_id, subject_id, homework_title, homework_description, employee_search', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'batch' => array(self::BELONGS_TO, 'Batches', 'batch_id'),
            'employee' => array(self::BELONGS_TO, 'Employees', 'employee_id'),
            'subject' => array(self::BELONGS_TO, 'Subjects', 'subject_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'batch_id' => 'Batch',
            'employee_id' => 'Employee',
            'employee_search' => 'Employee',
            'subject_id' => 'Subject',
            'homework_title' => 'Homework Title',
            'homework_description' => 'Homework Description',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('batch_id', $this->batch_id);
        $criteria->compare('employee_id', $this->employee_id);
        $criteria->compare('subject_id', $this->subject_id);
        $criteria->compare('homework_title', $this->homework_title, true);
        $criteria->compare('homework_description', $this->homework_description, true);

        $criteria->with = array(
            'employee'
        );
        $criteria->compare('employee.first_name', $this->employee_search, true);
        

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'employee_search' => array(
                        'asc' => 'employee.first_name',
                        'desc' => 'employee.first_name DESC'
                    ),
                    '*'
                )
            )
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ClassHomework the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
