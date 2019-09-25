<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author_id')->dropDownList($author)->label('Задача для пользователя') ?>

    <?= $form->field($model, 'status_id')->dropDownList(\common\models\Status::statusName())->label('Статус задачи') ?>

    <?= $form->field($model, 'priority_id')->dropDownList(\common\models\Priority::getPriorityName())->label('Приоритет задачи') ?>

    <?= $form->field($model, 'project_id')->dropDownList($project)->label('Задача для проекта') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
