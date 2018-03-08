<?php
if ($isMobile == true) {
    ?>
    <style type="text/css" xmlns="http://www.w3.org/1999/html">
        .disable {
            display: inline-block;
        }
    </style>
<?php
}
?>
<div class="map_1">
    <div id="map"></div>
</div>
<section id="search">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="searchAndselect">
                    <div class="search">
                        <div class="search-box">
                            <div class="logo-search">
                                <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/logo.png" alt=""/>
                            </div>
                            <div class="input-box">
                                <input id="search-value" class="input-text " type="text" placeholder="Tìm kiếm vị trí"/>

                                <div id="button-search">
                                    <!-- data-toggle="tooltip" data-placement="bottom" title="Tìm kiếm"-->
                                    <img
                                        src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/livemap/search_grey_24.png"
                                        alt=""/>
                                </div>
                                <div class="loader"></div>
                            </div>
                            <div class="direction-search-button">
                                <!-- data-toggle="tooltip" data-placement="bottom" title="Dẫn đường"-->
                                <div class="dir-image">
                                    <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/livemap/dir.png"
                                         alt=""/>
                                </div>
                            </div>
                            <div class="search-close-button">
                                <div class="close-image" id="close-black-button">
                                    <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/livemap/close-black.png"
                                         alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="select-city">
                        <select class="selectpicker">
                            <option>Hồ Chí Minh</option>
                            <option>Ketchup</option>
                            <option>Relish</option>
                        </select>
                    </div>
                </div>
                <!--Result-->
                <div class="search-result absolute search-sign" style="display: none">

                </div>
                <!-- Dowwnload && QR Code -->
                <div class="download-qr-around">
                    <div class="download-qr absolute" style="display: inline-block">
                        <div class="qr-code">
                            <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/livemap/qr.jpg" alt=""/>
                        </div>
                        <div class="slogan">
                            <p>Phần mềm dẫn đường</p>

                            <p>Dữ liệu thời gian thực</p>
                        </div>
                        <div class="download-button">
                            <a target="_blank" id="download-iphone"
                               href="https://itunes.apple.com/us/app/goong-dan-uong-thong-tin-giao/id1146854597?mt=8">Iphone</a>
                            <a target="_blank" id="download-android"
                               href="https://play.google.com/store/apps/details?id=com.map.goong.v2">Android</a>
                        </div>
                    </div>
                </div>


                <!-- Search Result Detail -->
                <div class="absolute search-result-detail search-sign">
                    <div class="search-result-detail-button">
                        <p>Đi đây</p>
                    </div>
                    <div class="search-result-detail-marker">
                        <div class="row">
                            <div class="search-result-detail-marker-image">
                                <div class="image"></div>
                                <div class="image-count"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="search-result-detail-marker-info">
                                <div class="name info-style"></div>
                                <div class="address info-style">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Detail-Suggestion-Marker-Short -->
                <div class="absolute detail-suggestion-marker-short">
                    <div class="suggestion-route-button">
                        <p>Đi đây</p>
                    </div>
                    <div class="detail-suggestion-marker">
                        <div class="row">
                            <div class="detail-suggestion-marker-image">
                                <div class="image"></div>
                                <div class="image-count"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="detail-suggestion-marker-info">
                                <div class="name info-style"></div>
                                <div class="info-style">
                                    <div class="col-md-4 star-rating">

                                    </div>
                                    <div class="col-md-4">
                                        <div class="cata">
                                        </div>
                                    </div>
                                </div>
                                <div class="address info-style">
                                </div>
                                <div class="phone-number info-style">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

            </div>
            <div class="col-md-5 suggest-box">
                <div id="traffic" class="suggest-box-border">
                    <div class="image-traffic image-suggest-box-style"></div><span>Giao thông</span>
                </div>
                <div id="atm" class="suggest-box-border">
                    <div class="image-bank image-suggest-box-style"></div><span>Ngân hàng</span>
                </div>
                <div id="fire" class="suggest-box-border">
                    <div class="image-gas image-suggest-box-style"></div><span>Trạm xăng</span>
                </div>
                <div id="hospital" class="suggest-box-border">
                    <div class="image-hospital image-suggest-box-style"></div><span>Y tế</span>
                </div>
                <div id="gara" class="suggest-box-border">
                    <div class="image-gara image-suggest-box-style"></div><span>Sửa xe</span>
                </div>
                <div id="suggestion" class="suggest-box-border">
                    <div class="image-places image-suggest-box-style"></div><span>Địa điểm</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="direction">
    <div class="direction-container" style="display: none">
        <!--Close Button-->
        <div class="dir-close-button">
            <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/livemap/close.png" alt=""/>
        </div>
        <!--Content-->
        <div class="dir-content">
            <div class="row">
                <ul class="nav nav-tabs">
                    <li id="route-car" class="active route-vehicle"><a href="#car" data-toggle="tab" data-toggle="tooltip"
                                                         data-placement="bottom"
                                                         title="Ô tô"
                            ><img
                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/livemap/iconCar@2x.png" alt=""/></a>
                    </li>
                    <li id="route-moto" class="route-vehicle"><a href="#motobike" data-toggle="tab" data-toggle="tooltip"
                                           data-placement="bottom"
                                           title="Xe máy"><img
                                src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/livemap/iconMotor@2x.png"
                                alt=""/></a></li>
                </ul>
            </div>
            <div class="row">
                <div class="dir-box">
                    <div class="dir-exchange">
                        <div class="dir-exchange-button">
                            <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/livemap/exchange_16.png"
                                 alt=""/>
                        </div>
                    </div>
                    <div id="dir-start" class="dir-input-style">
                        <label for="">Đi</label>
                        <input id="dir-start-input" type="text" placeholder="Xuất phát"/>

                        <div id="del-item-start" class="del-item-style">
                            <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/livemap/icon_deleipt.png"
                                 alt=""/>
                        </div>
                    </div>
                    <div id="dir-end" class="dir-input-style">
                        <label for="">Tới</label>
                        <input id="dir-end-input" type="text" placeholder="Kết thúc"/>

                        <div id="del-item-end" class="del-item-style">
                            <img src="<?= Yii::app()->getBaseUrl(true) ?>/assets/images/livemap/icon_deleipt.png"
                                 alt=""/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div id="del-dir">
                        <p>Xóa tuyến đường</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary dir-button">
                        <div class="loader-dir">
                            <i class="fa fa-spinner fa-spin"></i>
                        </div>
                        <span>Dẫn đường</span>
                    </button>
                </div>
            </div>
        </div>

    </div>
    <!--Detail Direction-->
    <div style="display: none" class="dir-detail-around" id="scrollbar">
        <div class="dir-detail">
            <div class="row">
                <ul class="nav nav-tabs">
                    <li id="route-fast" class="active choose-type-routing"><a href="#fastest" data-toggle="tab"
                                                                              data-toggle="tooltip"
                                                                              data-placement="bottom"
                                                                              title="Đường nhanh nhất">Nhanh nhất</a>
                    </li>
                    <li id="route-short" class="choose-type-routing"><a href="#shortest" data-toggle="tab"
                                                                        data-toggle="tooltip" data-placement="bottom"
                                                                        title="Đường ngắn nhất">Ngắn nhất</a></li>
                </ul>
            </div>
            <div class="row">
                <div id="short-detail">
                    <div class="tab-content">
                        <div class="tab-pane active" id="fastest">
                            <div class="panel-group panel-group-fast" id="accordion"></div>
                        </div>
                        <div class="tab-pane" id="shortest">
                            <div class="panel-group panel-group-short" id="accordion"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Direction Search Result-->

    <div class="dir-result-search">
        <div class="dir-result-search-container absolute " style="display: none">

        </div>
    </div>
</section>


<script type="text/javascript">
    /*Vệ tinh*/
// Token : pk.eyJ1IjoiZ29vbmciLCJhIjoiY2lxdnExbXp3MDAyMmZwbWdnM3hsMHJhOCJ9.yv3sSCjycKKfBvZSLuLg6w
// Style : mapbox://styles/goong/cj6q5prvq38ee2rmsditfj691
    mapboxgl.accessToken = 'pk.eyJ1IjoiZ29vbmciLCJhIjoiY2lxdnExbXp3MDAyMmZwbWdnM3hsMHJhOCJ9.yv3sSCjycKKfBvZSLuLg6w';
    var mapOption = {
        container: 'map', // container id
        style: 'mapbox://styles/goong/cj8fn15f70hpw2spoabpt3xp7', //stylesheet location
        center: [105.801944, 21.0226931], // starting position
        zoom: 14, // starting zoom
        minZoom: 3,
        maxZoom : 19

    };
    var map = new mapboxgl.Map(mapOption);

    map.addControl(new mapboxgl.FullscreenControl(), 'bottom-right');
    var navigation = new mapboxgl.NavigationControl();
    map.addControl(navigation, 'bottom-right');
    map.on('load', function () {
        map.dragRotate.disable();
        map3d();
        MarkerTypeClick();
        ButtonRemoveBlackClick();
        ButtonSearchEvent();
    });

    map.on('click', function () {
        $('.download-qr-around').removeClass('height-transform-QR').css('height', '0');
    });
    $('.input-text').mousedown(function () {
        InputSearchMouseDown();
    });
    $('[data-toggle="tooltip"]').tooltip();


    $('.selectpicker').selectpicker({
        style: 'btn-default',
        size: 5
    });

//        var locate = new mapboxgl.GeolocateControl();
//        map.addControl(locate, 'top-left');
//        var locate_lng, locate_lat;
//        locate.on('geolocate', function (e) {
//            locate_lng = e.coords.longitude;
//            locate_lat = e.coords.latitude;
//            console.log(locate_lng, locate_lat);
//        })


</script>
