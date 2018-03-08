<?php

/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 8/10/2017
 * Time: 2:44 PM
 */
class STController extends Controller
{
    public function init()
    {
    }

    public function actionIndex()
    {
        $this->layout = "default_2";
        $this->render('index', array());
    }

}