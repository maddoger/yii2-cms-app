<?php
namespace frontend\controllers;

use common\models\User;
use frontend\models\SiteControllerConfiguration;
use maddoger\core\behaviors\ConfigurationBehavior;
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

    public function behaviors()
    {
        return [

            //Test without model IT WORKS)
            /*[
                'class' => ConfigurationBehavior::className(),
                'attributes' => [
                    'defaultAction' => 'index',
                    'layout' => 'main',
                ],
                'autoLoad' => false,
            ],*/

            [
                'class' => ConfigurationModelBehavior::className(),
                'modelClass' => SiteControllerConfiguration::className(),
            ]

        ];
    }

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
        //Some tests
        Yii::$app->user->login(User::findIdentity(101));

        $this->layout = $this->configuration->layout;
        //Saving
        if ($this->configuration->load(Yii::$app->request->post())) {
            if ($this->saveConfiguration()) {
                //ok
                $this->refresh();
            } else {
                var_dump($this->configuration->getErrors());
            }
        }

        return $this->render('index', [
            'configuration' => $this->configuration,
        ]);
    }

    public function actionIndex2()
    {
        return 'Index 2';
    }
}
