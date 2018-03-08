<?php
/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 8/7/2017
 * Time: 2:50 PM
 */
/**
 * This is the model class for table "Marker Descriptions".
 *
 * The followings are the available columns in table 'photos':
 * @property integer $id
 * @property string $phone
 * @property string $address
 */
class MarkerDescriptions extends Db2
{
    public function tableName()
    {
        return 'marker_descriptions';
    }
    public function rules()
    {
        return array(
            array('id','numerical','integerOnly'=>true)
        );
    }
    public function relations()
    {
        return array();
    }
    public function  attributeLabels()
    {
        return array(
            'id' => 'ID',
            'address' => 'Address',
            'phone'=>'Phone'
        );
    }
    public function search()
    {
        $criteria = new CDbCriteria();
        $criteria -> compare('id',$this->id);
        $criteria -> compare('phone',$this->phone);
        $criteria -> compare('address',$this->address);
        return new CActiveDataProvider($this, array(
            'criteria' =>$criteria
        ));
    }
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}