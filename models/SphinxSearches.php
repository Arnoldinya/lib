<?php

namespace app\models;

use yii\sphinx\ActiveRecord;

class SphinxReader extends ActiveRecord
{
    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function indexName()
    {
        return 'index_search';
    }
}