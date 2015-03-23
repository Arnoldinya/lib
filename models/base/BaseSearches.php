<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "searches".
 *
 * @property integer $id
 * @property string $search
 * @property string $date_create
 */
class BaseSearches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'searches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['search'], 'required'],
            [['search'], 'string'],
            [['date_create'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'search' => 'Search',
            'date_create' => 'Date Create',
        ];
    }
}
