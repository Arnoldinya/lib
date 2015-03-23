<?php

namespace app\models\base;

use Yii;

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
class BaseAuthor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['date_create', 'date_update'], 'safe'],
            [['name'], 'string', 'max' => 250]
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
