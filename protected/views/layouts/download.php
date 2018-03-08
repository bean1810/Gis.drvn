<?php
include_once(Yii::app()->basePath . '/extensions/mail.php');
?>
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
    <link rel="shortcut icon" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/images/logo1.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    <meta name="google-site-verification" content="tn3xQXkUAvnTUXvzgDHncWqi3vYcYStfRFgCy17zO0E" />-->
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/bootstrap.min.css"/>

    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/css/font-awesome.min.css"/>

    <script type="text/javascript"
            src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/jquery-2.0.3.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/bootstrap.min.js"></script>

    <!--Particles-->
    <script type="text/javascript"
            src="<?php echo Yii::app()->getBaseUrl(true) ?>/assets/js/notification.js"></script>
    <title><?= Yii::app()->params['title'] ?></title>
    <meta name="description" content="<?= Yii::app()->params['meta-data'] ?>">
    <meta name="keywords" content="<?= Yii::app()->params['meta-keys'] ?>">
    <meta name="author" content="Goong Team">
    <meta property="og:title" content="<?= Yii::app()->params['meta-title'] ?>">
    <meta property="og:image" content="<?= Yii::app()->params['meta-image'] ?>">
    <meta property="og:url" content="<?= Yii::app()->params['meta-url'] ?>">
    <meta property="og:description" content="<?= Yii::app()->params['meta-data'] ?>">
</head>
<body>
<div class="wrapper">
    <?= $content ?>
</div>
</body>
</html>
<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Product",
  "name": "Goong - Phần mềm dẫn đường vệ tinh",
  "image": "http://www.example.com/anvil_executive.jpg",
  "description": "Goong - phần mềm dẫn đường bằng vệ tinh tốt nhất hiện nay, cập nhật thông tin giao thông 24/24 với độ chính xác cao.",
  "mpn": "925872",
  "brand": {
    "@type": "Thing",
    "name": "Goong"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5",
    "reviewCount": "1810"
  },
  "offers": {
    "@type": "Offer",
    "priceCurrency": "USD",
    "price": "99999999999",
    "priceValidUntil": "2020-11-05",
    "itemCondition": "http://schema.org/UsedCondition",
    "availability": "http://schema.org/InStock",
    "seller": {
      "@type": "Organization"
    }
  }
}
</script>



