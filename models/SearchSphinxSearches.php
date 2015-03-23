<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SphinxSearches;
use yii\sphinx\Query;

/**
 * SearchSphinxSearches represents the model behind the search form about `app\models\Searches`.
 */
class SearchSphinxSearches extends Searches
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'search', 'date_create'], 'safe'],
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
        $query = SphinxSearches::find();

        if (isset($_GET['SearchSphinxSearches'])) {
            $sMatch = implode(' ', $_GET['SearchSphinxSearches']);
            $query->match(trim($sMatch));
        }

        $aSphinxSearches = $query->all();

        $aId = [];
        foreach ($aSphinxSearches as $oSphinxSearches) {
            $aId[] = $oSphinxSearches->id;
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
