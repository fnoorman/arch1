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
class ShopUIAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'unify/Shop-UI/assets/plugins/bootstrap/css/bootstrap.min.css',
        'unify/Shop-UI/assets/css/shop.style.css',

    ];
    public $js = [
        'unify/Shop-UI/assets/plugins/jquery/jquery.min.js',
        'unify/Shop-UI/assets/plugins/jquery/jquery-migrate.min.js',
        'unify/Shop-UI/assets/plugins/bootstrap/js/bootstrap.min.js',
    ];
    public $depends = [
    ];
}
