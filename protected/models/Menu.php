<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property string $id
 * @property string $parent_id
 * @property string $title
 * @property string $url
 * @property string $class
 * @property integer $position
 * @property integer $group_id
 *
 * The followings are the available model relations:
 * @property Menu $parent
 * @property Menu[] $menus
 */
class Menu extends CActiveRecord {

    public $parent_search;
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'menu';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('position, group_id', 'numerical', 'integerOnly' => true),
            array('parent_id', 'length', 'max' => 11),
            array('title, url, class', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, parent_id, title, url, class, position, group_id, parent_search', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'parent' => array(self::BELONGS_TO, 'Menu', 'parent_id'),
            'menus' => array(self::HAS_MANY, 'Menu', 'parent_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'parent_id' => 'Parent',
            'parent_search' => 'Parent',
            'title' => 'Title',
            'url' => 'Url',
            'class' => 'Class',
            'position' => 'Position',
            'group_id' => 'Group',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('parent_id', $this->parent_id, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('class', $this->class, true);
        $criteria->compare('position', $this->position);
        $criteria->compare('group_id', $this->group_id);

//        return new CActiveDataProvider($this, array(
//            'criteria' => $criteria,
//        ));


        $criteria->with = array(
            'parent'
        );
        $criteria->compare('parent.title', $this->parent_search, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'parent_search' => array(
                        'asc' => 'parent.title',
                        'desc' => 'parent.title DESC'
                    )
                )
        )));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Menu the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
