<?php

namespace app\controllers;

use Yii;
use app\models\Searches;

use yii\sphinx\Query;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;

/**
 * BaseController основной контроллер для всех контроллеров.
 */
class BaseController extends Controller
{
    /**
    * возвращает ид сущностей для поиска
    * @param array aSphinxModel массив сфинкс моделей
    * @return srting id
    */
    public function getSearchIds($aSphinxModel)
    {
        $aId = [];
        foreach ($aSphinxModel as $oSphinxModel) {
            $aId[] = $oSphinxModel->id;
        }

        return ($aId) ? implode(', ', $aId) : '';
    }
}
