<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/jquery-jvectormap.css'
    ];
    public $js = [
        'js/Chart.js',
//        'js/morris.js',
//        'js/Dashboard2.js',
//        'js/bootstrap.min.js',
        'js/fastclick.js',
//        'js/jquery-jvectormap-1.2.2.min.js',
//        'js/jquery-jvectormap-world-mill-en.js',
//        'js/jquery.min.js',
//        'js/main.js',
//        'js/morris.js',
//        'js/slim.js',
//        'js/sparkline.js',
//        'js/jquery.flot.js',
//        'js/jquery.flot.resize.js',
//        'js/jquery.flot.pie.js',
//        'js/jquery.flot.categories.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
