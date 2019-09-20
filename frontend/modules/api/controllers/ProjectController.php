<?php

namespace frontend\modules\api\controllers;

use Yii;
use common\models\Project;
use common\models\Task;
use common\models\User;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;
use yii\web\ForbiddenHttpException;

/**
 * TaskController implements the CRUD actions for Task model.
 */
class ProjectController extends ActiveController
{
    public $modelClass = Project::class;

    public function behaviors(){
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];
        return $behaviors;
    }

    
}
