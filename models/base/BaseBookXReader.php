<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "book_x_reader".
 *
 * @property integer $book_id
 * @property integer $reader_id
 *
 * @property Book $book
 * @property Reader $reader
 */
class BaseBookXReader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book_x_reader';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'reader_id'], 'required'],
            [['book_id', 'reader_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'book_id' => 'Книга',
            'reader_id' => 'Читатель',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReader()
    {
        return $this->hasOne(Reader::className(), ['id' => 'reader_id']);
    }
}
