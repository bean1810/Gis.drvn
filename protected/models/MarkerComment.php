<?php
/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 8/7/2017
 * Time: 5:43 PM
 */
/**
 * This is the model class for table "photos".
 *
 * The followings are the available columns in table 'photos':
 * @property integer $id
 * @property integer $marker_id
 * @property string $content
 * @property string $user
 */
class MarkerComment extends Db2
{
    public function tableName()
    {
        return 'comments';
    }
    public function rules()
    {
        return array('id','numerical','integerOnly'=>true);
    }
    public function relations()
    {
        return array();
    }
    public function atttributeLabels()
    {
        return array(
            'id' => 'ID',
            'marker_id' => 'Marker Id',
            'content' => 'Content',
            'user' => 'User'
        );
    }

    public function Search()
    {
        $criteria = new CDbCriteria();
        $criteria -> compare('id',$this->id);
        $criteria->compare('marker_id',$this->marker_id);
        $criteria->compare('content',$this->content);
        $criteria->compare('user',$this->user);
        return new CActiveDataProvider($this,array(
            'criteria' => $criteria,
        ));
    }
    public static function model($classname=__CLASS__)
    {
        return parent::model($classname);
    }
}