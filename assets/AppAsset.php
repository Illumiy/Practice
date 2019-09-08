<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/form.css',
        'css/camera.css',
        'css/grid.css',
        'css/ie.css',
        'css/reset.css',
        'css/touchTouch.css',
        'css/style.css',
        'css/superfish.css',
    ];
    public $js = [
       // 'js/jquery.js',
      //  'js/camera.js',
      //  'js/forms.js',
     //   'js/html5shiv.js',
        'js/jquery.easing.1.3.js',
        'js/jquery.equalheights.js',
     //   'js/jquery.mobile.customized.min.js',
        'js/jquery-migrate-1.1.1.js',
        'js/main.js',
        'js/superfish.js',
        'js/touchTouch.jquery.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
