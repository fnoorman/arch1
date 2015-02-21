<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SUISiteIndexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        
        'unify/Shop-UI/assets/plugins/line-icons/line-icons.css',
        'unify/Shop-UI/assets/plugins/font-awesome/css/font-awesome.min.css',
        'unify/Shop-UI/assets/plugins/scrollbar/src/perfect-scrollbar.css',
        'unify/Shop-UI/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css',
        'unify/Shop-UI/assets/plugins/revolution-slider/rs-plugin/css/settings.css',

    ];
    public $js = [

         'unify/Shop-UI/assets/plugins/back-to-top.js',
         'unify/Shop-UI/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js',
         'unify/Shop-UI/assets/plugins/scrollbar/src/jquery.mousewheel.js',
         'unify/Shop-UI/assets/plugins/scrollbar/src/perfect-scrollbar.js',
         'unify/Shop-UI/assets/plugins/jquery.parallax.js',
         'unify/Shop-UI/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js',
         'unify/Shop-UI/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js',
         'unify/Shop-UI/assets/js/custom.js',
         'unify/Shop-UI/assets/js/shop.app.js',
         'unify/Shop-UI/assets/js/plugins/owl-carousel.js',
         'unify/Shop-UI/assets/js/plugins/revolution-slider.js',
    ];
    public $depends = [
        'frontend\assets\ShopUIAsset'
    ];
}
