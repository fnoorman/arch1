<?php 
namespace frontend\assets\unify;

use yii\web\AssetBundle;

class SiteIndexAsset extends AssetBundle
{
	public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    
    'unify/assets/plugins/line-icons/line-icons.css',
    'unify/assets/plugins/font-awesome/css/font-awesome.min.css',
    'unify/assets/plugins/parallax-slider/css/parallax-slider.css',
    'unify/assets/plugins/fancybox/source/jquery.fancybox.css',
    'unify/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css', 
    ];

    public $cssOptions = ['media'=>'screen','type'=>'text/css'];
    public $js = [        
        'unify/assets/plugins/jquery.parallax.js',
        'unify/assets/plugins/parallax-slider/js/modernizr.js',
        'unify/assets/plugins/parallax-slider/js/jquery.cslider.js',
        'unify/assets/plugins/fancybox/source/jquery.fancybox.pack.js',
        'unify/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js',
        'unify/assets/js/plugins/fancy-box.js',
        'unify/assets/js/plugins/owl-carousel.js',
    ];
    public $depends = [
        'frontend\assets\unify\UYFrontendAsset',
    ];
}

 ?>
