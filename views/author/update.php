<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $oAuthor app\models\Author */

$this->title = 'Редактирование автора: ' . ' ' . $oAuthor->name;
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $oAuthor->name, 'url' => ['view', 'id' => $oAuthor->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="author-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'oAuthor' => $oAuthor,
    ]) ?>

</div>
