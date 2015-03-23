<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $oReader app\models\Reader */

$this->title = 'Редактирвоание читателя: ' . ' ' . $oReader->name;
$this->params['breadcrumbs'][] = ['label' => 'Читатели', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $oReader->name, 'url' => ['view', 'id' => $oReader->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="reader-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'oReader' => $oReader,
    ]) ?>

</div>
