<?php
namespace frontend\controllers;

use maddoger\core\behaviors\ConfigurationModelBehavior;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 *
 * @property \frontend\models\SiteControllerConfiguration $configuration
 */
class SiteController extends Controller
{
    public $defaultAction = 'index';

    public $layout = 'main';

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionIndex2()
    {
        return 'Index 2';
    }
}
