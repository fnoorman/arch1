<?php 
namespace frontend\assets\unify;

use yii\web\AssetBundle;

class UYFrontendAsset extends AssetBundle
{
	public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    'unify/assets/plugins/bootstrap/css/bootstrap.min.css',
    'unify/assets/css/style.css',
    
    ];

    public $cssOptions = ['media'=>'screen','type'=>'text/css'];
    public $js = [        
        'unify/assets/plugins/jquery/jquery.min.js',
        'unify/assets/plugins/jquery/jquery-migrate.min.js',
        'unify/assets/plugins/bootstrap/js/bootstrap.min.js',
        'unify/assets/plugins/back-to-top.js',
    ];
    public $depends = [

    ];
}

 ?>
