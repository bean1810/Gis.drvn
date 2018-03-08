<?php
/**
 * Created by PhpStorm.
 * User: Buminta
 * Date: 2/23/14
 * Time: 12:57 PM
 */

class ApiController extends Controller{
  public function init(){
    Functions::startup();
  }
  public function actionIndex(){
    $content = array('status'=>'hello world!');
    $this->renderJSON($content);
  }
}