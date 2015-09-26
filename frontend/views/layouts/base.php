<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="<?= Url::to('/favicon.ico' ) ?>" type="image/x-icon">
    <link rel="icon" href="<?= Url::to('/favicon.ico' ) ?>" type="image/x-icon">
    <title><?= Html::encode($this->title, false) ?></title>
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <header>
        <div class="container">
            Some header
        </div>
    </header>

    <div id="content"><?= $content ?></div>

    <div class="container">
        <footer>
            Copyright 2015
        </footer>
    </div>
</div>
<?php
$this->endBody();
?>
</body>
</html>
<?php $this->endPage() ?>
