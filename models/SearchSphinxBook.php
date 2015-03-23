<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SphinxBook;
use yii\sphinx\Query;

/**
 * SearchSphinxBook represents the model behind the search form about `app\models\SphinxBook`.
 */
class SearchSphinxBook extends Book
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'date_create', 'date_update'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SphinxBook::find();

        if ($params && isset($params['SearchSphinxBook'])) {
            $sMatch = implode(' ', $params['SearchSphinxBook']);
            $query->match(trim($sMatch));
        }

        $aSphinxBook = $query->limit(1000)->all();

        $aId = [];
        foreach ($aSphinxBook as $oSphinxBook) {
            $aId[] = $oSphinxBook->id;
        }

        $query = Book::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if($aId)
            $query->where('id in ('.implode(', ', $aId).')');
        else
            $query->where('0=1');

        return $dataProvider;
    }
}
