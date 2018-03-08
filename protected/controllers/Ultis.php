<?php

class Ultis
{

    public static function getmarker_inbear($lng,$lat){
        /*Suggest More*/
        /*GET MARKER IN BEAR*/
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://napi.goong.io/v1/marker/get_markers_in_bear",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_CONNECTTIMEOUT => 2,
            CURLOPT_TIMEOUT => 3,
            CURLOPT_USERAGENT =>'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0',
            CURLOPT_VERBOSE =>  true,
            CURLOPT_SSL_VERIFYHOST=>false,
            CURLOPT_SSL_VERIFYPEER =>false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_POSTFIELDS => "{\r\n\t\"lat\": $lng,\r\n\t\"lng\": $lat,\r\n\t\"distance\": 1000,\r\n\t\"type_code\": [\"SUGGESTION\"],\r\n\t\"bearing\": 0,\r\n\t\"angle\": 60,\r\n\t\"limit\": 8,\r\n\t\"page\": 0,\r\n\t\"zoom\": 15\r\n}",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
//            echo "cURL Error #:" . $err;
        } else {
            $resp_decode = json_decode($response, true);

            for ($i = 0; $i < count($resp_decode); $i++) {
                $bear_id = $resp_decode[$i]["id"];
                $bear_lng = $resp_decode[$i]["lng_lat"][0];
                $bear_lat = $resp_decode[$i]["lng_lat"][1];

                /*Get IMAGE*/
                $bear_img_url = 'http://napi.goong.io/v1/marker/get_marker_detail/' . $bear_id . '/images?page=0&limit=1';
                $bear_get = file_get_contents(urldecode($bear_img_url));
                $bear_img_json_decode = json_decode($bear_get, true);
                if (count($bear_img_json_decode) > 0) {
                    $resp_decode[$i]["bear_img"] = $bear_img_json_decode[0]["image_url"];
                }

                /*Reserve Marker Address*/


                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://geo.goong.io/Location/Reserve",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => 1,
                    CURLOPT_CONNECTTIMEOUT => 2000,
                    CURLOPT_TIMEOUT => 3000,
                    CURLOPT_VERBOSE =>  true,
                    CURLOPT_SSL_VERIFYHOST=>false,
                    CURLOPT_SSL_VERIFYPEER =>false,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_POSTFIELDS => "{\r\n  \"lon\": $bear_lng,\r\n  \"lat\": $bear_lat\r\n}",
                    CURLOPT_HTTPHEADER => array(
                        "content-type: application/json"
                    ),
                ));

                $bear_reserve = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {

                } else {
                    $bear_reserve_decode = json_decode($bear_reserve, true);
                    $resp_decode[$i]["description"] = $bear_reserve_decode["description"];
                }

            }

            echo "<pre>";
            print_r($resp_decode);
            echo "</pre>";
        }
    }
    public static function http_post($url,$lng,$lat)
    {

        try {
            $headers = array(
                'Content-Type: application/json'
            );
            // Open connection
            $ch = curl_init();
            $data ="{\r\n\t\"lat\": $lng,\r\n\t\"lng\": $lat,\r\n\t\"distance\": 1000,\r\n\t\"type_code\": [\"SUGGESTION\"],\r\n\t\"bearing\": 0,\r\n\t\"angle\": 60,\r\n\t\"limit\": 8,\r\n\t\"page\": 0,\r\n\t\"zoom\": 15\r\n}";
            // Set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // disable SSL certificate support
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            // execute post
            $result = curl_exec($ch);
            if ($result === FALSE) {
                throw new Exception('Curl failed: ' . curl_error($ch));
            }
            // Close connection
            curl_close($ch);
            //Process result
            $json_result = json_decode($result);
            if ($json_result !== null) {
                return $json_result;
            } else {
                throw new Exception($result);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
