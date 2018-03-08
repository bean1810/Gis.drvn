<?php
/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 11/27/2017
 * Time: 3:54 PM
 */
//$filename = "/var/www/GoongLivemap/assets/js/tcdb/content.txt";
$filename = Yii::getPathOfAlias('webroot').'/assets/js/tcdb/content.txt';
//$content = file_get_contents($filename,FILE_USE_INCLUDE_PATH);
$openFile = fopen($filename,"r");
$TinhThanhpho = array();
$Dvql = array();
$Sohieutuyen = array();
while($line = fgets($openFile)){
    $words = explode('|',$line);
    if(!in_array($words[4],$TinhThanhpho)) {
        array_push($TinhThanhpho, $words[4]);
    }
}
echo "<pre>";
print_r($TinhThanhpho);
echo "</pre>";