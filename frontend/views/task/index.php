<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Task;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Задачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать задачу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'label'=>'Задача к проекту',
                'value'=> function (Task $model) {
                    return $model->project->project_name;
                }
            ],
            [
                'attribute' => 'name',
                'label'=>'Название',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a($model->name, ['task/view', 'id'=>$model->id]);
                }
            ],
            [
                'attribute' => 'description',
                'label'=>'Описание',
            ],
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
