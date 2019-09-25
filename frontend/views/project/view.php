<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use common\models\Project;
use common\models\Task;

/* @var $this yii\web\View */
/* @var $model backend\models\Project */

$this->title = $model->project_name;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id',
                'label'=>'ID проекта',
            ],
            [
                'attribute' => 'project_name',
                'label'=>'Название проекта',
            ],
            [
                'label'=>'Автор',
                'value'=> function (Project $model) {
                    return $model->user->username;
                }
            ],
            [
                'label'=>'Статус',
                'value'=> function (Project $model) {
                    return $model->projectStatus->project_status_name;
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
<div><h1>Задачи проекта</h1></div>
<br>
<?= GridView::widget([
        'dataProvider' => $taskDataProvider,
        'filterModel' => $taskSearchModel,
        'columns' => [
            [
                'attribute' => 'name',
                'label'=>'Название',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a($model->name, ['task/view', 'id'=>$model->id]);
                }
            ],
            'description',
            [
                'label'=>'Автор',
                'value'=> function (Task $model) {
                    return $model->author->username;
                }
            ],
            [
                'label'=>'Статус',
                'value'=> function (Task $model) {
                    return $model->status->name;
                }
            ],
            [
                'label'=>'Приоритет',
                'value'=> function (Task $model) {
                    return $model->priority->name;
                }
            ],
            [
                'attribute' => 'created_at',
                'format' => 'datetime',
                'label'=>'Дата создания',
            ],

        
        ],
    ]); ?>

</div>
