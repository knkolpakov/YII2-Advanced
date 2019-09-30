<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Project;
use common\models\Task;

/* @var $this yii\web\View */
/* @var $model common\models\Task */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'name',
                'label'=>'Название задачи',
            ],
            [
                'attribute' => 'description',
                'label'=>'Описание задачи',
            ],
            [
                'label'=>'Для кого задача',
                'value'=> function (Task $model) {
                    return $model->author->username;
                }
            ],
            [
                'label'=>'Статус задачи',
                'value'=> function (Task $model) {
                    return $model->status->name;
                }
            ],
            [
                'label'=>'Приоритет задачи',
                'value'=> function (Task $model) {
                    return $model->priority->name;
                }
            ],
            [
                'label'=>'Задача для проекта',
                'format' => 'raw',
                'value'=> function (Task $model) {
                    return Html::a($model->project->project_name, ['project/view', 'id'=>$model->project->id]);
                }
            ],
            [
                'attribute' => 'created_at',
                'format' => 'datetime',
                'label'=>'Дата создания',
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'datetime',
                'label'=>'Дата обновления',
            ],
        ],
    ]) ?>

</div>
