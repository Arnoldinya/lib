<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $title
 * @property string $date_create
 * @property string $date_update
 *
 * @property BookXAuthor[] $bookXAuthors
 * @property Author[] $authors
 * @property BookXReader[] $bookXReaders
 * @property Reader[] $readers
 */
class Book extends \app\models\base\BaseBook
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
     * @return \yii\db\ActiveQuery
     */
    public function getBookXAuthors()
    {
        return $this->hasMany(BookXAuthor::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['id' => 'author_id'])->viaTable('book_x_author', ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookXReaders()
    {
        return $this->hasMany(BookXReader::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReaders()
    {
        return $this->hasMany(Reader::className(), ['id' => 'reader_id'])->viaTable('book_x_reader', ['book_id' => 'id']);
    }
}
