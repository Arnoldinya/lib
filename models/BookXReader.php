<?php

namespace app\models;

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
class BookXReader extends \app\models\base\BaseBookXReader
{
	/* Проверка на уникальность пары.
	* Этот метод является валидатором 'uniquePair' для метода rules().
	*/

	public function uniquePair($attribute, $params)
	{
		$oBookXReader = BookXReader::find()->where([
			'book_id' => $this->book_id,
			'reader_id' => $this->reader_id,
		])->one();
		
		if($oBookXReader && $oBookXReader->id!=$this->id)
			$this->addError($attribute, 'Такая запись уже есть в бд!');
	}

	public function rules()
    {
		$aRules = parent::rules();

		$aNewRules = [
			[['book_id', 'reader_id'], 'uniquePair'],
		];

		return array_merge($aRules, $aNewRules);
    }
}
