<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\HttpException;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception HttpException */

$this->title = $name;

if ($exception instanceof HttpException) {
    $code = $exception->statusCode;
} else {
    $code = YII_DEBUG ? $exception->getCode() : 500;
}

?>
<div class="error-container">
    <h2 class="code"><?= $code ?></h2>

    <h3 class="name"><?= Html::encode($name) ?></h3>

    <div class="error-details">
        <?= $message ?>
    </div>
    <!-- /error-details -->
    <div class="error-actions">
        <a href="<?= Yii::$app->request->getReferrer(); ?>" class="btn">Вернуться назад</a> &nbsp;
        <a href="<?= Url::base(true) ?>" class="btn">На главную</a>
    </div>
</div>
