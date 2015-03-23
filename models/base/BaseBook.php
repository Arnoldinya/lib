<?php

namespace app\models\base;

use Yii;

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
class BaseBook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['date_create', 'date_update'], 'safe'],
            [['title'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'date_create' => 'Дата создания',
            'date_update' => 'Дата изменения',
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
