<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Project;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Проекты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать проект', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'project_name',
                'label'=>'Название',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a($model->project_name, ['project/view', 'id'=>$model->id]);
                }
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
