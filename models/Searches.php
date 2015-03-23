<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "searches".
 *
 * @property integer $id
 * @property string $search
 * @property string $date_create
 */
class Searches extends \app\models\base\BaseSearches
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function rules()
    {
        $aRules = parent::rules();

        $aNewRules = [
            [['search'], 'unique'],
        ];

        return array_merge($aRules, $aNewRules);
    }
}
