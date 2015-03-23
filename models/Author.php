<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\db\Expression;
/**
 * This is the model class for table "author".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_create
 * @property string $date_update
 *
 * @property BookXAuthor[] $bookXAuthors
 * @property Book[] $books
 */
class Author extends \app\models\base\BaseAuthor
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
        return $this->hasMany(BookXAuthor::className(), ['author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['id' => 'book_id'])->viaTable('book_x_author', ['author_id' => 'id']);
    }
}
