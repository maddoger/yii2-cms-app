<?php
namespace frontend\controllers;

use common\models\User;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
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

        /** @var \maddoger\core\components\KeyStorage $keyStorage */
        $keyStorage = Yii::$app->keyStorage;

        //Yii::$app->cache->flush();
        for ($i=0; $i<10; $i++) {
            $keyStorage->set('TEST_KEY_'.$i, [$i => rand()]);
        }

        //var_dump($keyStorage->getAllKeys());
        var_dump($keyStorage->mdelete(['TEST_KEY_0', 'TEST_KEY_1']));

        var_dump($keyStorage->getAll());



        return $this->render('index');
    }
}
