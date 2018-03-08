<?php
/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 7/27/2017
 * Time: 3:47 PM
 */

/**
 * This is the model class for table "photos".
 *
 * The followings are the available columns in table 'photos':
 * @property integer $id
 * @property string $icon_url
 * @property string $icon_bg_corlor
 * @property double $rating_point
 */
class Markers extends Db2
{
    public function tableName()
    {
        return 'markers';
    }
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('id','numerical','integerOnly'=>true)
        );
    }
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array();
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'icon_url' => 'Icon URL',
            'icon_bg_color' => 'Icon BG',
            'rating_point' => 'rating_point'
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
        $criteria = new CDbCriteria();
        $criteria ->compare('id',$this->id);
        $criteria ->compare('icon_url',$this->icon_url);
        $criteria ->compare('icon_bg_corlor', $this->icon_bg_corlor);
        $criteria ->compare('rating_point', $this->rating_point);
        return new CActiveDataProvider($this,array(
            'criteria' => $criteria
        ));
    }
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Markers the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}