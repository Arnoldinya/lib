<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $oBook app\models\Book */

$this->title = 'Редактирование книги: ' . ' ' . $oBook->title;
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $oBook->title, 'url' => ['view', 'id' => $oBook->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'oBook' => $oBook,
    ]) ?>

</div>
