<?php

namespace frontend\modules\api\controllers;

use Yii;
use common\models\User;
use yii\rest\ActiveController;

/**
 * TaskController implements the CRUD actions for Task model.
 */
class UserController extends ActiveController
{
    public $modelClass = User::class;

}
