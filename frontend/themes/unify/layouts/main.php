<?php  
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\ShopUIAsset;
use frontend\widgets\Alert;


ShopUIAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Bekazon</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ################## Yii2 Meta tags start ################## -->
    <?= Html::csrfMetaTags() ?>
    <!-- ################## Yii2 Meta tags end   ################## -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- CSS Global Compulsory -->
    <!-- ################## ShopUIAsset Asset bundle for Unify start ################## -->
    <?php $this->head() ?>
	<!-- ################## ShopUIAsset Asset bundle for Unify end   ################## -->
    


    <!-- CSS Theme -->
    <link rel="stylesheet" href="unify/Shop-UI/assets/css/theme-colors/default.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="unify/Shop-UI/assets/css/custom.css">
</head>	
<?php $this->beginBody() ?>
<body class="header-fixed">
	
	<?= $content ?>

<?php $this->endBody() ?>
<script>
    jQuery(document).ready(function() {
        App.init();
        App.initParallaxBg();
        OwlCarousel.initOwlCarousel();
        RevolutionSlider.initRSfullWidth();      
});
</script>
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/js/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>
<?php $this->endPage() ?>
