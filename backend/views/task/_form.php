<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Название задачи') ?>

<?= $form->field($model, 'description')->textArea(['maxlength' => true])->label('Описание задачи') ?>

<?= $form->field($model, 'author_id')->dropDownList($author)->label('Задача для пользователя') ?>

<?= $form->field($model, 'status_id')->dropDownList(\common\models\Status::statusName())->label('Статус задачи') ?>

<?= $form->field($model, 'priority_id')->dropDownList(\common\models\Priority::getPriorityName())->label('Приоритет задачи') ?>

<?= $form->field($model, 'project_id')->dropDownList($project)->label('Задача для проекта') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
