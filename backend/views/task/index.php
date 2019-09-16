<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tracker',
            'status_id',
            'topic',
            'id_project',
            //'author_id',
            //'performer_id',
            //'created_at',
            //'updated_at',
            //'category_id',
            //'priority_id',
            //'description:ntext',
            //'readiness',
            //'resolution_id',
            //'version',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
