<?php
/**
 * Created by PhpStorm.
 * User: Buminta
 * Date: 1/6/14
 * Time: 1:32 AM
 */

Class Auth{
    public static function getAllMenu(){
        $cat_model = Yii::app()->params['menu_categories'];
        $act_model = Yii::app()->params['menu_actions'];
        $cat = new $cat_model();
        $act = new $act_model();
        $cat_list = $cat->findAll();
        $temp = array();
        foreach ($cat_list as $val){
            $tmp = $act->findAll("category_id = ".$val['id']);
            $arr = array();
            foreach($tmp as $value){
                $arr[$value['name']] = array(
                    'controller'=>$value['controller'],
                    'action'=>$value['action']
                );
            }
            $temp[$val['name']] = $arr;
        }
        return $temp;
    }

   // Change waiting...
   // public static function getMenu($user_id){
   //     $list = array();
   //     $user = new User();
   //     $group_id = $user->find("id = ".$user_id)['group_id'];
   //     $action = new Permission();
   //     $permission = new GroupPermission();
   //     $list_action = $permission->findAll("group_id = ".$group_id);
   //     $cat = new CategoryPermission();
   //     $list_category = $action->findAll("id in (SELECT permission_id from group_permission where group_id = ".$group_id.") group by category_id");

   //     foreach($list_category as $key=>$value){
   //         array_push($list,array(
   //             'id'=>$value['category_id'],
   //             'name'=>$cat->find("id = ".$value['category_id'])['name'],
   //             'action'=>array()
   //         ));
   //     }
   //     foreach($list_action as $key=>$value){
   //         foreach($list as $i=>$cat){
   //             $tmp = $action->find("id = ".$value['permission_id']);
   //             if($cat['id'] == $tmp['category_id']){
   //                 array_push($list[$i]['action'],array(
   //                     'id'=>$tmp['id'],
   //                     'control'=>$tmp['controller'],
   //                     'action'=> $tmp['action'],
   //                     'name'=>$tmp['name']
   //                 ));
   //             }
   //         }
   //     }
   //     return $list;
   // }
   // public static function permission($control=null, $func=null){
   //     if(is_null($control)) $control = Yii::app()->controller->id;
   //     if(is_null($func)) $func = Yii::app()->controller->action->id;
   //     try{
   //         $id = Yii::app()->session['user_id'];
   //         $user = new User();
   //         $action = new Permission();
   //         $act = $action->find("controller = '".$control."' and action = '".$func."'");
   //         if($act){
   //             $group_id = $user->find("id = ".$id)['group_id'];
   //             $permission = new GroupPermission();
   //             $result = $permission->find("group_id = ".$group_id." and permission_id = ".$act['id']);
   //             if($result) return true;
   //         }
   //     }
   //     catch(Exception $e){

   //     }
   //     Yii::app()->request->redirect(Yii::app()->getBaseUrl(true)."/error?err=70");
   //     return false;
   // }
    public static function hashCode($user, $pass){
        return sha1(md5($user.$pass));
    }
}