<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchReader */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Читатели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reader-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить читателя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'filter' => false,
            ],
            'name',
            [
                'attribute' => 'date_create',
                'filter' => false,
            ],
            [
                'attribute' => 'date_create',
                'filter' => false,
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
