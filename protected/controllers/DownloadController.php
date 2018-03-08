<?php
/**
 * Created by PhpStorm.
 * User: Buminta
 * Date: 2/26/14
 * Time: 10:37 PM
 */
class DownloadController extends Controller{
    public function init(){

    }
    public function actionGetFile(){
        Functions::logs();
        $filename = $_GET['id'];
        $this->layout = "backend";
        $this->render("index", array(
            'filename'=>$filename
        ));
    }
    public function actionFiles(){
        $filename = $_GET['id'];
        $file = Yii::getPathOfAlias('webroot')."/files/".$filename;
        $arr = explode(".",$filename);
        $extension = $arr[count($arr)-1];
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$arr[count($arr)-2].".".$extension);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    }
}