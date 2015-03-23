<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $oBook app\models\Book */

$this->title = $oBook->title;
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактирвоать', ['update', 'id' => $oBook->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $oBook->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $oBook,
        'attributes' => [
            'id',
            'title',
            'date_create',
            'date_update',
        ],
    ]) ?>

    <h2>Авторы</h2>
    <?php if ($aAuthors): ?>
        <table class="table table-striped table-bordered">
            <tr>
                <th>
                    №
                </th>
                <th>
                    Имя
                </th>
            </tr>
        <?php foreach ($aAuthors as $i=>$oAuthor): ?>
            <tr>
                <td>
                    <?= $i + 1; ?>
                </td>
                <td>
                    <a href="<?= Url::toRoute(['author/view', 'id' => $oAuthor->id]);?>">
                        <?= $oAuthor->name; ?>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        </table>
        <?= LinkPager::widget([
            'pagination' => $oPagesAuthor,
        ]);?>
    <?php else:?>
        Нет
    <?php endif ?>

    <h2>Читатели</h2>
    <?php if ($oBook->readers): ?>
        <table class="table table-striped table-bordered">
            <tr>
                <th>
                    №
                </th>
                <th>
                    Имя
                </th>
            </tr>
        <?php foreach ($oBook->readers as $k=>$oReader): ?>
            <tr>
                <td>
                    <?= $k + 1; ?>
                </td>
                <td>
                    <a href="<?= Url::toRoute(['reader/view', 'id' => $oReader->id]);?>">
                        <?= $oReader->name; ?>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        </table>
        <?= LinkPager::widget([
            'pagination' => $oPagesReader,
        ]);?>
    <?php else:?>
        Нет
    <?php endif ?>

</div>
