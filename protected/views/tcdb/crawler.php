<?php
/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 12/6/2017
 * Time: 3:41 PM
 */
//$filename = Yii::getPathOfAlias('webroot').'/upload/IMG/BRG/';

$filename = Yii::getPathOfAlias('webroot').'/assets/js/tcdb/content.txt';
//$content = file_get_contents($filename,FILE_USE_INCLUDE_PATH);
$openFile = fopen($filename,"r");
$images = array();
$idbrg = array();
while($line = fgets($openFile)){
    $words = explode('|',$line);
    $split = explode(";",$words[34]);
    $id = "";
    for($i = 0;$i<count($split);$i++){
        if(empty($split[$i]))continue;
        array_push($images,$split[$i]);
        $id = explode("_",$split[$i]);
        if(!in_array($id[0],$idbrg)){
            array_push($idbrg,$id[0]);
        }
    }
}
echo "<pre>";
print_r($idbrg);
echo "</pre>";
for($j = 1;$j<count($idbrg);$j++){
    if (!file_exists(Yii::getPathOfAlias('webroot').'upload/IMG/BRG/bridge_'.$idbrg[$j])) {
        mkdir(Yii::getPathOfAlias('webroot').'upload/IMG/BRG/bridge_'.$idbrg[$j], 0777, true);
    }
}

//define('DIRECTORY', $filename);
//
//$content = file_get_contents('http://drvn.vn/IMG/BRI/10010_IMG_9365.jpg');
//file_put_contents(DIRECTORY . '/image.jpg', $content);
?>