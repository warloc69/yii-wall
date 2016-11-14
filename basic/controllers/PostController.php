<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11.11.16
 * Time: 16:20
 */

namespace app\controllers;

use app\models\Like;
use app\models\Post;
use yii\rest\ActiveController;
use Yii;
use yii\web\Response; use yii\helpers\ArrayHelper;

class PostController extends ActiveController
{
    public $modelClass = 'app\models\Post';

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'only' => ['view', 'index'],  // in a controller
                // if in a module, use the following IDs for user actions
                // 'only' => ['user/view', 'user/index']
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
                'languages' => [
                    'en',
                    'de',
                ],
            ],
        ]);
    }

    public function actionLikes() {
        $liks_model = new Post();
        return $liks_model->find()->all()[0]->likes;
//        return $liks_model->getLikes()->all();
    }
}