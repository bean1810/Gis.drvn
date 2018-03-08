<?php
    class Users_logsModel extends CActiveRecord{
        public $hashCode = array(
            
        );
        public $alias;
        public $label_select = 'id';
        public function tableName()
        {
            return 'users_logs';
        }
        public $label = array(
            'from_url'=>array(
                        'name'=>'From URL',
                        'type'=>'text',
                        
                    ),'link'=>array(
                        'name'=>'Link',
                        'type'=>'text',
                        
                    ),'time'=>array(
                        'name'=>'Time',
                        'type'=>'date',
                        
                    ),'address'=>array(
                        'name'=>'IP Address',
                        'type'=>'text',
                        
                    ),'platform'=>array(
                        'name'=>'Platform',
                        'type'=>'text',
                        
                    ),'browser'=>array(
                        'name'=>'Browser',
                        'type'=>'text',
                        
                    ),
        );

        public static function model($className = __CLASS__)
        {
            return parent::model($className);
        }
        public function add($arr){
            foreach ($this->label as $key => $value) {
                $this->$key = isset($arr[$key])?$arr[$key]:null;
            }
            foreach ($this->hashCode as $key => $value){
                $this->$key = Auth::hashCode($this->$value,$this->$key);
            }
            $this->create_by = null;
            if(isset(Yii::app()->session['auth_user']) && Yii::app()->session['auth_user'] != ''){
                $this->create_by = intval(Yii::app()->session['auth_user']);
            }
            $date = new DateTime();
            $this->create_on = $date->format('Y-m-d H:i:s');
            return $this->save();
        }
        public function upAll($arr, $condition){
            $arrTmp = $arr;
            $old = $this->find($condition);
            foreach ($this->hashCode as $key => $value){
                $arrTmp[$key] = Auth::hashCode($old[$value],$arrTmp[$key]);
                $arr[$key] = Auth::hashCode($old[$value],$arr[$key]);
            }
            $arrTmp['modify_by'] = null;
            if(isset(Yii::app()->session['auth_user']) && Yii::app()->session['auth_user'] != ''){
                $arrTmp['modify_by'] = intval(Yii::app()->session['auth_user']);
            }
            $date = new DateTime();
            $arrTmp['modify_on'] = $date->format('Y-m-d H:i:s');
            try{
                return $this->updateAll($arrTmp, $condition);
            }
            catch(Exception $e){
                return $this->updateAll($arr, $condition);
            }
        }
    }