<?php
/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 5/3/2017
 * Time: 4:06 PM
 */
class Utils {
    public function curl_get($url){
        try {
            // Open connection
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
            curl_setopt($ch, CURLOPT_TIMEOUT,3000);
            curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/22.0.1216.0 Safari/537.2');
            $result = curl_exec($ch);
            curl_close($ch);
            if(empty($result)){
                die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
            }else{
                return $result;
            }
            // Close connection
        } catch (Exception $e) {
            throw $e;
        }

    }

    public static function marker_name_header($url){
        $get = file_get_contents(($url));
        $json_decode = json_decode($get, true);
        $flag = $json_decode['success'];
        if($flag == 1){
            $icon = $json_decode['data']['icon_url'];
            if(empty($icon))$icon = 'https://ss3.4sqi.net/img/categories_v2/travel/hotel_100.png';
            $name = $json_decode['data']['name'];
            $rating_point = ($json_decode['data']['rating_point'])/2;
            $address = $json_decode['data']['description']['address'];
            if(empty($address))$address = 'Đang cập nhật';

            echo '<div class="col-md-1">
            <img src="'.$icon.'" style="border-radius:3px;width:90px;background-color:#dbdbe0;float:left;padding:7px;">
          </div>
            <div class = "name-header">
                <h1>'.$name.'</h1>
                <p>'.$address.'</p>
                <input id="count-rating" data-size="xs" name="count-rating" value="'.$rating_point.'" class="rating-loading" />
            </div>';
        }

    }

    public static function Mapmini($url){
        $get = file_get_contents(($url));
        $json_decode = json_decode($get, true);
        $flag = $json_decode['success'];
        if ($flag == 1){
            $icon = $json_decode['data']['icon_url'];
            if(empty($icon))$icon = 'https://ss3.4sqi.net/img/categories_v2/travel/hotel_100.png';
            $bg_icon = $json_decode['data']['icon_bg_corlor'];
            if(empty($bg_icon))$bg_icon = '#dbdbe0';
            $phone = $json_decode['data']['description']['phone'];
            if(empty($phone))$phone = 'Đang cập nhật';
            $name = $json_decode['data']['name'];
            $address = $json_decode['data']['description']['address'];
            if(empty($address))$address = 'Đang cập nhật';
            $lat = $json_decode['data']['lng_lat'][0];
            $lng = $json_decode['data']['lng_lat'][1];
            $mapmini = "<script type='text/javascript'>
            mapboxgl.accessToken = 'pk.eyJ1IjoiZ29vbmciLCJhIjoiY2lxdnExbXp3MDAyMmZwbWdnM3hsMHJhOCJ9.yv3sSCjycKKfBvZSLuLg6w';
            var mapOption = {
                container: 'map', // container id
                style: 'mapbox://styles/goong/ciqvq35t20000cxm6ns9ucndc', //stylesheet location
                center: [$lat,$lng], // starting position
                zoom: 16,
                interactive: false
            };
            var map = new mapboxgl.Map(mapOption);
            geojson = {
                'type': 'FeatureCollection',
                'features': [
                    {
                        'type': 'Feature',
                        'properties': {
                            'iconSize': [30, 33]
                        },
                        'geometry': {
                            'type': 'Point',
                            'coordinates': [
                                $lat,
                                $lng
                            ]
                        }
                    }]
            };
            geojson.features.forEach(function (marker) {
                // create a DOM element for the marker
                var el = document.createElement('div');
                var div = document.createElement('div');
                div.className = 'marker_get';
                div.id = 'mini';
                div.style.backgroundImage = 'url(/assets/images/icon_marker/canvas.png)';
                div.style.backgroundSize = '30px 32px';
                div.style.width = marker.properties.iconSize[0] + 'px';
                div.style.height = marker.properties.iconSize[1] + 'px';
                el.appendChild(div);
                var img = document.createElement('img');
                img.className = 'marker_foursquare';
                img.src = '$icon';
                img.style.background = '$bg_icon';
                img.style.backgroundSize ='30px 32px';
                img.style.width = '22px';
                img.style.height = '20px';
                img.style.marginTop = '4px';
                img.style.marginLeft = '4px';
                img.style.borderRadius = '4px';
                div.appendChild(img);
                markers = new mapboxgl.Marker(el, {offset: [-marker.properties.iconSize[0] / 2, -marker.properties.iconSize[1] / 2]})
                    .setLngLat(marker.geometry.coordinates)
                    .addTo(map);
            });
</script>";
            echo '<div class="map-mini">
                <div id="map">
                   '.$mapmini.'
                </div>
                <div class="name-descript">
                    <img src="https://ss1.4sqi.net/img/venuepage/v2/venue_detail_address-aa5c2a1ab3bf2784d8f6ee57026a73c0.png" alt="" style="float: left;margin-right: 10px;margin-top: 4px;margin-left: 5px"/>
                    <h5>'.$name.'</h5>
                    <p>'.$address.'</p>
                </div>
                <div class="phone-contact">
                    <img src="https://ss0.4sqi.net/img/venuepage/v2/venue_detail_phone-56d850d0a0506e1ce08284d7b1ad16e7.png" alt="" style="float: left; margin-right: 10px;margin-top: 4px;margin-left: 5px"/>
                    <p>'.$phone.'</p>
                </div>
</div>';
        }


    }

    public static function EmptyData($url){
        $get = file_get_contents(($url));
        $json_decode = json_decode($get, true);
        $flag = $json_decode['success'];
        if($flag == 0){
            echo '<script type="text/javascript">
            $(".wrapper").html("").css({
                "height":"420px",
                "background-color": "#fff"
            });
            $("<div><h1>Lỗi</h1><p>Không tìm thấy dữ liệu</p></div>").css({
                "text-align" : "center",
                "position" : "relative",
                "top" : "185px"
            }).appendTo(".wrapper");
        </script>';
        }
    }
}