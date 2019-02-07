<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/base.css',
        'css/fonts.css',
        'css/main.css',
        'css/vendor.css',
        'css/doc.css',
        '//use.fontawesome.com/releases/v5.6.3/css/all.css'
    ];
    public $js = [
        '/js/modernizr.js',
        '/js/pace.min.js',
        '/js/plugins.js',
        '/js/main.js',
        '/js/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
