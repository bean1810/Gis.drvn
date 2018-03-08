<?php
/**
 * Created by PhpStorm.
 * User: Buminta
 * Date: 2/23/14
 * Time: 1:04 PM
 */

class ErrorController extends Controller{
    public function init(){
    }
    public function actionIndex(){
        $this->layout = "html";
        $this->render('index', array());
    }
}