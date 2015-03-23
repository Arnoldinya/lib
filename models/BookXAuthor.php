<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_x_author".
 *
 * @property integer $book_id
 * @property integer $author_id
 *
 * @property Book $book
 * @property Author $author
 */
class BookXAuthor extends \app\models\base\BaseBookXAuthor
{
	/* Проверка на уникальность пары.
	* Этот метод является валидатором 'uniquePair' для метода rules().
	*/

	public function uniquePair($attribute, $params)
	{
		$oBookXAuthor = BookXAuthor::find()->where([
			'book_id' => $this->book_id,
			'author_id' => $this->reader_id,
		])->one();
		
		if($oBookXAuthor && $oBookXAuthor->id!=$this->id)
			$this->addError($attribute, 'Такая запись уже есть в бд!');
	}

	public function rules()
    {
		$aRules = parent::rules();

		$aNewRules = [
			[['book_id', 'author_id'], 'uniquePair'],
		];

		return array_merge($aRules, $aNewRules);
    }
}
