<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Библиотека Компании';
?>
<div class="site-index">

    <h2>Список книг, находящихся на руках у читателей, и имеющих не менее трех со-авторов</h2>
    <?php if ($aBooks): ?>
        <table class="table table-striped table-bordered">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Название
                </th>
            </tr>
            <?php foreach ($aBooks as $aBook): ?>
                <tr>
                    <td>
                        <?= $aBook['id'];?>
                    </td>
                    <td>
                        <a href="<?= Url::toRoute(['book/view', 'id' => $aBook['id']]);?>">
                            <?= $aBook['title'];?>
                        </a>                        
                    </td>
                </tr>                
            <?php endforeach ?>
        </table>
    <?php endif ?>

    <h2>Список авторов, чьи книги в данный момент читает более трех читателей</h2>
    <?php if ($aAuthors): ?>
        <table class="table table-striped table-bordered">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Имя
                </th>
            </tr>
            <?php foreach ($aAuthors as $aAuthor): ?>
                <tr>
                    <td>
                        <?= $aAuthor['id'];?>
                    </td>
                    <td>
                        <a href="<?= Url::toRoute(['author/view', 'id' => $aAuthor['id']]);?>">
                            <?= $aAuthor['name'];?>
                        </a>                        
                    </td>
                </tr>                
            <?php endforeach ?>
        </table>
    <?php endif ?>

    <h2>Пять случайных книг</h2>
    <?php if ($aRandBooks): ?>
        <table class="table table-striped table-bordered">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Название
                </th>
            </tr>
            <?php foreach ($aRandBooks as $aRandBook): ?>
                <tr>
                    <td>
                        <?= $aRandBook['id'];?>
                    </td>
                    <td>
                        <a href="<?= Url::toRoute(['book/view', 'id' => $aRandBook['id']]);?>">
                            <?= $aRandBook['title'];?>
                        </a>                        
                    </td>
                </tr>                
            <?php endforeach ?>
        </table>
    <?php endif ?>

</div>
