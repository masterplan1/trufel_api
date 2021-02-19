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
//        'css/site.css',
        'css/style.css',
        'css/image-zoom.css',
        'css/order.css',
        'css/candybar_style.css',
        'css/modal_candybar.css',
    ];
    public $js = [
        'js/datepicker.js',
        'js/main.js',
        'js/ajax.js',
        'js/order.js',
        'js/orderprod.js',
        'js/modal_candybar.js',
        'js/order-diatery.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
