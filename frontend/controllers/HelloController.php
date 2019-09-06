<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class HelloController extends Controller
{

    public function actionIndex()
    {
        return $this->render('hello');
    }
}

