<?php 
namespace frontend\assets\unify;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
	public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [    
    'unify/assets/plugins/line-icons/line-icons.css',
    'unify/assets/plugins/font-awesome/css/font-awesome.min.css',
    'unify/assets/css/pages/page_log_reg_v2.css',
    ];

    public $cssOptions = ['media'=>'screen','type'=>'text/css'];
    public $js = [        
    ];
    public $depends = [
        'frontend\assets\unify\UYFrontendAsset',
    ];
}

 ?>
