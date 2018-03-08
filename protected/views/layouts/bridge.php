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
    <!--FaceBook-->
    <!--    <div id="fb-root"></div>-->
    <!--    <script>(function(d, s, id) {-->
    <!--            var js, fjs = d.getElementsByTagName(s)[0];-->
    <!--            if (d.getElementById(id)) return;-->
    <!--            js = d.createElement(s); js.id = id;-->
    <!--            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=263679944106467";-->
    <!--            fjs.parentNode.insertBefore(js, fjs);-->
    <!--        }(document, 'script', 'facebook-jssdk'));</script>-->
    <!--    <meta name="google-site-verification" content="tn3xQXkUAvnTUXvzgDHncWqi3vYcYStfRFgCy17zO0E" />-->
    <link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/images/logo1.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=”description” content="Goong Phần mềm dẫn đường bằng vệ tinh"/>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
    <meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
    <meta http-equiv="Pragma" content="no-cache">
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
    <link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/test/livemap.css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/wrapper.css"/>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.38.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.38.0/mapbox-gl.css' rel='stylesheet'/>
    <script src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/Map/geo_utils.js"></script>
    <script src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/Map/leaflet.js"></script>
    <script src="https://unpkg.com/supercluster@2.3.0/dist/supercluster.min.js"></script>
    <!--Jquery Layout-->
    <link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true) ?>/assets/css/tcdb/jquery.ui.all.css"/>
<!--    <script src="--><?//= Yii::app()->getBaseUrl(true) ?><!--/assets/js/tcdb/jquery.layout-latest.js"></script>-->
<!--    <script src="--><?//= Yii::app()->getBaseUrl(true) ?><!--/assets/js/tcdb/jquery-ui-latest.js"></script>-->
<!--    <script src="--><?//= Yii::app()->getBaseUrl(true) ?><!--/assets/js/tcdb/themeswitchertool.js"></script>-->

    <!--Leaflet-->


    <!--Livemap-->
    <meta name="description" content="<?= Yii::app()->params['meta-data'] ?>">
    <meta name="keywords" content="<?= Yii::app()->params['meta-keys'] ?>">
    <meta name="author" content="Goong Team">
    <meta property="og:title" content="<?= Yii::app()->params['meta-title'] ?>">
    <meta property="og:image" content="<?= Yii::app()->params['meta-image'] ?>">
    <meta property="og:url" content="<?= Yii::app()->params['meta-url'] ?>">
    <meta property="og:description" content="<?= Yii::app()->params['meta-data'] ?>">
    <title><?= Yii::app()->params['title-livemap'] ?></title>
</head>
<body id="customer">
<div class="wrapper">
    <?= $content ?>
</div>
</body>
</html>

