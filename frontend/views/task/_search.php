<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tracker') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'topic') ?>

    <?= $form->field($model, 'author_id') ?>

    <?php // echo $form->field($model, 'performer_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'priority') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'readiness') ?>

    <?php // echo $form->field($model, 'resolution') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
