<?php

namespace frontend\modules\api\controllers;

use Yii;
use common\models\Task;
use common\models\User;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;
use yii\web\ForbiddenHttpException;

/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends ActiveController
{
    public $modelClass = Task::class;

    public function behaviors(){
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];
        return $behaviors;
    }

    public function checkAccess($action, $model = null, $params = []){
        if ($action === 'update' || $action === 'delete'){
            if($action === 'view'){
                if($model->author_id != \Yii::$app->user->id){
                    throw new ForbiddenHttpException('Нельзя смотреть не свои задачи');
                }
            }
        }
    }
}
