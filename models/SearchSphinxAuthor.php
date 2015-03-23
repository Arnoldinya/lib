<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SphinxAuthor;

/**
 * SearchSphinxAuthor represents the model behind the search form about `app\models\SphinxBook`.
 */
class SearchSphinxAuthor extends Author
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'date_create', 'date_update'], 'safe'],
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
        $query = SphinxAuthor::find();

        if ($params && isset($params['SearchSphinxAuthor'])) {

            $sMatch = implode(' ', $params['SearchSphinxAuthor']);
            $query->match(trim($sMatch));
        }

        $aSphinxAuthor = $query->limit(1000)->all();

        $aId = [];
        foreach ($aSphinxAuthor as $oSphinxAuthor) {
            $aId[] = $oSphinxAuthor->id;
        }

        $query = Reader::find();

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
