<?php

/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 8/17/2017
 * Time: 2:15 PM
 */
class SiteCommand extends CConsoleCommand
{
    public function run()
    {
        $status = 'ACCEPT';
        $arrayrobottxt = array();
        $name = Yii::app()->db2->createCommand("Select name,id from markers where status = '" . $status . "'")->queryAll();
        for ($i = 1; $i < floor(count($name) / 5000); $i++) {
            $createsitemap = fopen('../sitemap.map.' . $i . '.xml', 'w');
            $sitemap = 'Sitemap: http://goong.io/sitemap.map.' . $i . '.xml' . "\r\n";
            array_push($arrayrobottxt, $sitemap);
            if ($i === 1) {
                $start = 0;
                $limit = floor(count($name) / 14);
            } else {
                $start = (floor(count($name) / 14) * ($i - 1)) - 1;
                $limit = floor(count($name) / 14) * $i;
            }
            $header = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
            fwrite($createsitemap, $header);
            for ($j = $start; $j <= $limit; $j++) {
                if (empty($name[$j]['name'])) continue;
                $txt = '<url >
                    <loc>http://goong.io/detail/' . $name[$j]['id'] . '.' . Functions::locDau($name[$j]['name']) . '.html</loc>
                    <changefreq>always</changefreq>
                    <priority>0.80</priority>
                </url >';
                fwrite($createsitemap, $txt);
                if ($j == $limit) {
                    $footer = '</urlset>';
                    fwrite($createsitemap, $footer);
                }
            }
        }
$txtrobot = "User-agent: *

Allow: /detail/*.html
Allow: /livemap/*
Allow: /privacy/*
Allow: /services/*

Disallow: /admin/*

Sitemap: http://goong.io/sitemap.map.0.xml\r\n";
        $robots = fopen('../robotsssst.txt', 'w');
        fwrite($robots, $txtrobot);
        for ($k = 0; $k < count($arrayrobottxt); $k++) {
            fwrite($robots, $arrayrobottxt[$k]);
        }
    }
}