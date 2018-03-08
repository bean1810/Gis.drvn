<?php

/**
 * Created by PhpStorm.
 * User: Buminta
 * Date: 2/23/14
 * Time: 1:35 PM
 */
class AdminController extends Controller
{
  public function init()
  {
    $this->layout = "backend";
    if (!isset(Yii::app()->session['auth_user']) || (Yii::app()->session['auth_user'] == "") && (Yii::app()->controller->action->id != "login")) {
      return $this->redirect(Yii::app()->getBaseUrl(true) . "/home/login");
    }
  }

  public function actionIndex()
  {
    return $this->redirect(Yii::app()->getBaseUrl(true) . "/admin/genform");
  }

  public function actionChangePass()
  {
    if (isset($_POST["password"]) && isset($_POST["new_password"]) && isset($_POST["re_new_password"])) {
      if ($_POST["new_password"] != $_POST["re_new_password"]) Yii::app()->session['error'] = 'Mật khẩu gõ 2 lần không giống nhau';
      else {
        $model = new Auth_userModel();
        $user = $model->find("id = '" . Yii::app()->session['auth_user'] . "'");
        $info = $model->find("username = '" . $user['username'] . "' and password = '" . Auth::hashCode($user['username'], $_POST['password']) . "'");
        if (!$info) Yii::app()->session['error'] = 'Sai mật khẩu';
        else {
          $val = array();
          $val["password"] = $_POST["re_new_password"];
          $model->upAll($val, "id = " . Yii::app()->session['auth_user']);
          Yii::app()->session['error'] = 'Thành công';
        }
        return $this->render('changepass', array());
      }
    }
    $this->render('changepass', array());
  }

  public function actionGenForm()
  {
    try {
      if (isset($_GET['id'])) {
        $class = ucfirst($_GET['id']) . "Model";
        $obj = new $class();
        if (isset($_GET['control']) && ($_GET['control'] == "new") && count($_POST) > 0) {
          $val = array();
          foreach ($obj->label as $key => $value) {
            $val[$key] = $_POST[$key];
          }
          $obj->add($val);
          return $this->redirect(Yii::app()->getBaseUrl(true) . "/admin/genform/id/" . $_GET['id']);
        }
        if (isset($_GET['control']) && ($_GET['control'] == "edit") && count($_POST) > 0 && (isset($_GET['child'])) && ($_GET['child'] != "")) {
          $val = array();
          foreach ($obj->label as $key => $value) {
            $val[$key] = $_POST[$key];
          }
          $obj->upAll($val, "id = " . $_GET['child']);
          return $this->redirect(Yii::app()->getBaseUrl(true) . "/admin/genform/id/" . $_GET['id']);
        }
        if (isset($_GET['control']) && ($_GET['control'] == "delete") && ($_GET['child'])) {
          $obj->deleteAll("id = " . $_GET['child']);
          return $this->redirect(Yii::app()->getBaseUrl(true) . "/admin/genform/id/" . $_GET['id']);
        }
        return $this->render('genform', array(
          'obj' => $obj
        ));
      }
    } catch (Exception $e) {
//            return var_dump($e);
      return $this->render('genform', array(
        'error' => $e->getMessage()
      ));
    }
    return $this->render('genform', array());
  }

  public function actionUpload()
  {
    $this->render('upload', array());
  }
}