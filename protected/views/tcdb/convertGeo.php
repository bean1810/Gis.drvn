<?php
$filename = Yii::getPathOfAlias('webroot') . '/assets/js/tcdb/data/cau_treo.geojson';
$filename1 = Yii::getPathOfAlias('webroot') . '/assets/js/tcdb/data/bridge_ratyeu.geojson';
$json = json_decode(file_get_contents($filename), true);
$json1 = json_decode(file_get_contents($filename1), true);
$data = $json['features'][0];
$data1 = $json1['features'][0];
//echo count($data);
//for ($i = 0; $i < count($data); $i++) {
//    $lon = $data[$i]['properties']['lon'];
//    $lat = $data[$i]['properties']['lat'];
//    $newElement['geometry'] = array(
//        'type' => 'Point',
//        'coordinates' => array(
//            0 => $lon,
//            1 => $lat
//        )
//
//    );
//    array_push($data[$i],$newElement);
//}
//$LastData = json_encode($json, JSON_UNESCAPED_UNICODE);
//file_put_contents($filename, $LastData);
echo "<pre>";
print_r($json1);
echo "</pre>";
echo "<pre>";
print_r($json);
echo "</pre>"
?>