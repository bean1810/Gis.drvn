<!--/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 6/8/2017
 * Time: 4:29 PM
 */-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="alternate" href="http://goong.io/" hreflang="x-default" />
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        //        ga('create', 'UA-92077822-1', 'auto');
        ga('create', 'UA-99012802-1', 'auto');
        ga('send', 'pageview');

    </script>

    <!--    <meta name="google-site-verification" content="tn3xQXkUAvnTUXvzgDHncWqi3vYcYStfRFgCy17zO0E" />-->
    <link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/images/logo1.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--        <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1,user-scalable=no,maximum-scale=1">-->
    <!-- Latest compiled and minified CSS -->
    <!--Star Rating-->

    <!--  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/bootstrap.min.css"/>
    <!-- Optional theme -->
    <!--  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">-->
    <!--        <link rel="stylesheet" href="--><?php //echo Yii::app()->getBaseUrl(true) ?><!--/assets/css/style_1.css"/>-->
    <link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/services.css"/>
    <link rel="stylesheet" href="https://js.arcgis.com/4.0/esri/css/main.css">
    <!--    <link rel="stylesheet" href="--><?php //echo Yii::app()->getBaseUrl(true) ?><!--/assets/css/responsive.css"/>-->
    <link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/font-awesome.min.css"/>
    <script type="text/javascript"
            src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/jquery-2.0.3.min.js"></script>
    <!--Map-->
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.35.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.35.1/mapbox-gl.css' rel='stylesheet' />

    <script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/typed.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/service-page.js"></script>
    <script src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/menu-service.js"></script>



    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/bootstrap.min.js"></script>


    <script type="text/javascript"
            src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/notification.js"></script>
    <title>Goong</title>
</head>
<body data-spy="scroll" data-target=".navbar-default" data-offset="20">
<nav class="navbar-top navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="fa fa-bars fa-lg"></span>
            </button>
            <a class="navbar-brand" href="<?php echo Yii::app()->getBaseUrl(true) ?>">
                <img src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/images/logo.png" alt="" class="logo"><a
                    id="slo" href="<?php echo Yii::app()->getBaseUrl(true) ?>">Goong</a>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav H navbar-right">
                <li><a class="home" href="<?php echo Yii::app()->getBaseUrl(true) ?>/#home">Trang chủ</a>
                </li>
                <li><a class="about" href="<?php echo Yii::app()->getBaseUrl(true) ?>/#about">Giới Thiệu</a>
                </li>
                <li><a class="features" href="<?php echo Yii::app()->getBaseUrl(true) ?>/#feature">Tính Năng</a>
                </li>
                <?php if(Yii::app()->controller->id == 'home'  && Yii::app()->controller->action->id == 'privacy'):  ?>
                    <li class="active"><a class="privacys" href="<?php echo Yii::app()->getBaseUrl(true) ?>/privacy">Điều khoản & Chính
                            sách</a>
                    </li>
                <?php else : ?>
                    <li><a class="privacys" href="<?php echo Yii::app()->getBaseUrl(true) ?>/privacy">Điều khoản & Chính
                            sách</a>
                    </li>
                <?php endif; ?>
                <?php if(Yii::app()->controller->id == 'home'  && Yii::app()->controller->action->id == 'services'):  ?>
                    <li class="active"><a class="services" href="<?php echo Yii::app()->getBaseUrl(true) ?>/services">
                            Dịch Vụ
                        </a>
                    </li>
                <?php else : ?>
                    <li><a class="services" href="<?php echo Yii::app()->getBaseUrl(true) ?>/services">Dịch Vụ</a>
                    </li>
                <?php endif; ?>
                <?php if(Yii::app()->controller->id == 'home'  && Yii::app()->controller->action->id == 'livemap'):$display = "none"  ?>
                    <li class="active" ><a class="Livemap " href="<?php echo Yii::app()->getBaseUrl(true) ?>/livemap">Live Map</a>
                    </li>

                <?php else :$display = "" ?>
                    <li><a class="Livemap" href="<?php echo Yii::app()->getBaseUrl(true) ?>/livemap">Live Map</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-->
</nav>
<div class="wrapper">
    <?= $content ?>
</div>
<footer>
    <div class="container">
        <div class="row foter">
            <div class="col-xs-4 col-sm-4 col-md-4 one">
                <p>Cài đặt tại Google Play và App Store</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 two">
                <a target="_blank"
                   href="https://itunes.apple.com/us/app/goong-dan-uong-thong-tin-giao/id1146854597?mt=8"><img
                        src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/images/applestore.png" alt=""/></a>
                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.map.goong.v2"><img
                        src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/images/goolgeplay.png" alt=""/></a>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 three">
                <p class="lang" key="goong"> &copy; 2016, Goong, Inc, All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>



