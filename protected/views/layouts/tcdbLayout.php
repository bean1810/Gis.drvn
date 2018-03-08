<?php
/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 11/20/2017
 * Time: 2:49 PM
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="alternate" href="http://goong.io/" hreflang="x-default"/>

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-99012802-1', 'auto');
        ga('send', 'pageview');

    </script>
    <link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/images/tcdb/tcdb.ico">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name=”description” content="Bản đồ thông tin dữ liệu Tổng cục ĐBVN"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,target-densitydpi=device-dpi, user-scalable=no"
    <!-- Latest compiled and minified CSS -->
    <!--Star Rating-->

    <!--  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true) ?>/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/bootstrap.min1.css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/font-awesome.min.css"/>

    <script type="text/javascript"
            src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/jquery-2.0.3.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= Yii::app()->getBaseUrl(true) ?>/assets/js/bootstrap-select.min.js"></script>


    <script type="text/javascript"
            src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/notification.js"></script>
    <!--Livemap-->
<!--    <link rel="stylesheet" href="--><?php //echo Yii::app()->getBaseUrl(true) ?><!--/assets/css/test/livemap.css"/>-->
    <link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/wrapper.css"/>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.38.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.38.0/mapbox-gl.css' rel='stylesheet'/>
    <script src='https://api.mapbox.com/mapbox.js/plugins/turf/v2.0.2/turf.min.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.0/mapbox-gl-draw.css' type='text/css'/>
    <script src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/tcdb/geo_utils.js"></script>
    <script src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/tcdb/leaflet.js"></script>
    <script src="https://unpkg.com/supercluster@2.3.0/dist/supercluster.min.js"></script>
    <!--Jquery Layout-->
    <link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true) ?>/assets/css/tcdb/style.min.css"/>
    <script type="text/javascript" src="<?= Yii::app()->getBaseUrl(true) ?>/assets/js/tcdb/html2canvas.js"></script>
    <!--<script src="<?/*= Yii::app()->getBaseUrl(true) */?>/assets/js/tcdb/jquery.layout-latest.js"></script>
    <script src="<?/*= Yii::app()->getBaseUrl(true) */?>/assets/js/tcdb/jquery-ui-latest.js"></script>
    <script src="<?/*= Yii::app()->getBaseUrl(true) */?>/assets/js/tcdb/themeswitchertool.js"></script>-->

    <!--Leaflet-->
    <!--FancyBox-->
    <script type="text/javascript"
            src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/fancy/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/fancy/jquery.fancybox.min.css"/>

    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript"
            src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/fancy/jquery.mousewheel.pack.js?v=3.1.3"></script>

    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript"
            src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/fancy/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/fancy/jquery.fancybox.css?v=2.1.5" media="screen"/>

    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/fancy/jquery.fancybox-buttons.css?v=1.0.5"/>
    <script type="text/javascript"
            src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/fancy/jquery.fancybox-buttons.js?v=1.0.5"></script>

    <!-- Add Thumbnail helper (this is optional) -->
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/fancy/jquery.fancybox-thumbs.css?v=1.0.7"/>
    <script type="text/javascript"
            src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/fancy/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript"
            src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/fancy/jquery.fancybox-media.js?v=1.0.6"></script>
    <!--End Fancybox-->

    <!--Livemap-->
    <meta name="description" content="<?= Yii::app()->params['meta-data'] ?>">
    <meta name="keywords" content="<?= Yii::app()->params['meta-keys'] ?>">
    <meta name="author" content="Goong Team">
    <meta property="og:title" content="<?= Yii::app()->params['meta-title'] ?>">
    <meta property="og:image" content="<?= Yii::app()->params['meta-image'] ?>">
    <meta property="og:url" content="<?= Yii::app()->params['meta-url'] ?>">
    <meta property="og:description" content="<?= Yii::app()->params['meta-data'] ?>">
    <title>Bản đồ thông tin dữ liệu Tổng cục ĐBVN</title>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <script>
        $(window).load(function() {
            $(".se-pre-con").fadeOut("slow");
        });
    </script>
    <style type="text/css">
        .se-pre-con{
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(../../../assets/images/tcdb/Preloader_8.gif) center no-repeat #fff;
        }
        .se-pre-con-1{
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 2;
            opacity: .5;
            background: url(../../../assets/images/tcdb/Preloader_8.gif) center no-repeat #fff;
        }
    </style>
</head>
<body id="customer">
<div class="se-pre-con"></div>
<div class="wrapper">
    <?= $content ?>
</div>
</body>
</html>

