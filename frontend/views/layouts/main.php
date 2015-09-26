<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */
$this->beginContent(__DIR__ . '/base.php');
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12"><?= $content; ?></div>
    </div>
</div>
<?php $this->endContent(); ?>
