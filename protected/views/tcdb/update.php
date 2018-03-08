<?php
/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 11/23/2017
 * Time: 4:31 PM
 */

/*Delete bridge depend on bridgeid*/
function DeleteBridge($bridgeId)
{
    $filename = Yii::getPathOfAlias('webroot') . '/assets/js/tcdb/bridge_Yeu.geojson';
    $json = json_decode(file_get_contents($filename), true);
    $data = $json['features'];
    echo count($data);
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    for ($i = 0; $i < count($json['features']); $i++) {
        $bridgeID = $json['features'][$i]['properties']['bridgeid'];
        if ($bridgeID === $bridgeId) {
            echo "<pre>";
            print_r($json['features'][$i]['properties']);
            echo "</pre>";
            unset($json['features'][$i]);
        }
    };
    $LastData = json_encode($json, JSON_UNESCAPED_UNICODE);
    file_put_contents($filename, $LastData);
}

$filename = Yii::getPathOfAlias('webroot') . '/assets/js/tcdb/bridge_Yeu.geojson';
$json = json_decode(file_get_contents($filename), true);
$data = $json['features'];
echo count($data);
echo "<pre>";
print_r($data);
echo "</pre>";
$newElement = array();
$newElement['type'] = "Feature";
$newElement['geometry'] = array(
    'type' => 'Point',
    'coordinates' => array(
        0 => 106.292497,
        1 => 21.445042
    )

);
$newElement['properties'] = array(
    'bridgeid' => 1995,
    'constructi' => '',
    'name' => 'Thủy Triều',
    'chainage' => '344 Km 436',
    'prov' => 'CB',
    'city' => '',
    'longitude' => 106.292497,
    'latitude' => 21.445042,
    'pitch' => 0,
    'roadtype' => 'N',
    'crossobj' => 'SOG',
    'buildyr' => 0,
    'owner' => 'Chi cục QLĐB I.4',
    'unit' => 'Chi cục QLĐB I.4',
    'signtype' => 'Biển 106a + 505b',
    'pltonnage' => '23-29-32',
    'roadno' => 'QL03',
    'uplaneno' => 2,
    'unlaneno' => 0,
    'detonnage' => '',
    'brist' => 'Yếu',
    'exploreyr' => 0,
    'length' => 35.4,
    'width' => 9.5,
    'mainpierno' => 1,
    'pierno' => 0,
    'longestpie' => 26.4,
    'ttlpierlen' => 26.4,
    'drivesize' => 7,
    'walksize' => 2,
    'grosssize' => 9.5,
    'skewangle' => 0,
    'bciav' => 100,
    'bcicrit' => 115,
    'images' => '18037_DSC02059.JPG;18037_IMAG2134.jpg;18037_DSC02060.JPG;18037_DSC02062.JPG;18037_DSC02063.JPG;18037_DSC02064.JPG;',
    'mgrname' => 'Cục Quản lý đường bộ I',
);
//echo "<pre>";
//print_r($newElement);
//echo "</pre>";
//array_push($json['features'], $newElement);
$LastData = json_encode($json, JSON_UNESCAPED_UNICODE);
file_put_contents($filename, $LastData);
?>
