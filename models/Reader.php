<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "reader".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_create
 * @property string $date_update
 *
 * @property BookXReader[] $bookXReaders
 * @property Book[] $books
 */
class Reader extends \app\models\base\BaseReader
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'date_create' => 'Дата создания',
            'date_update' => 'Дата изменения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookXReaders()
    {
        return $this->hasMany(BookXReader::className(), ['reader_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['id' => 'book_id'])->viaTable('book_x_reader', ['reader_id' => 'id']);
    }
}
