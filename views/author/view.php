<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $oAuthor app\models\Author */

$this->title = $oAuthor->name;
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $oAuthor->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $oAuthor->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $oAuthor,
        'attributes' => [
            'id',
            'name',
            'date_create',
            'date_update',
        ],
    ]) ?>

    <h2>Книги</h2>
    <?php if ($oAuthor->books): ?>
        <table class="table table-striped table-bordered">
            <tr>
                <th>
                    №
                </th>
                <th>
                    Имя
                </th>
            </tr>
        <?php foreach ($oAuthor->books as $k=>$oBook): ?>
            <tr>
                <td>
                    <?= $k + 1; ?>
                </td>
                <td>
                    <a href="<?= Url::toRoute(['book/view', 'id' => $oBook->id]);?>">
                        <?= $oBook->title; ?>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        </table>
        <?= LinkPager::widget([
            'pagination' => $oPagesBook,
        ]);?>
    <?php else:?>
        Нет
    <?php endif ?>

</div>
