<?php

namespace app\controllers;

use Yii;
use app\models\Book;
use app\models\SearchSphinxBook;
use app\models\Author;
use app\models\SearchAuthor;
use app\models\Reader;
use app\models\BookXAuthor;
use app\models\BookXReader;
use app\models\SphinxAuthor;
use app\models\SphinxReader;
use app\models\Searches;

use yii\sphinx\Query;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends BaseController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $aParams = Yii::$app->request->queryParams;
        $searchModel = new SearchSphinxBook();
        $dataProvider = $searchModel->search($aParams);

        //сохраняем поисковые запросы
        if ($aParams && isset($aParams['SearchSphinxBook'])) {
            $sMatch = implode(' ', $aParams['SearchSphinxBook']);

            $oSearches = new Searches();
            $oSearches->search = trim($sMatch);

            $oSearches->save();
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $oBook = $this->findModel($id);

        $queryAuthor = Author::find()->joinWith('bookXAuthors')->where([
            'book_x_author.book_id' => $id
        ]);
        $countQueryAuthor = clone $queryAuthor;

        $oPagesAuthor = new Pagination([
            'totalCount' => $countQueryAuthor->count(),
            'defaultPageSize' => 10,
        ]);
        $aAuthors = $queryAuthor->offset($oPagesAuthor->offset)
            ->limit($oPagesAuthor->limit)
            ->all();

        $queryReader = Reader::find()->joinWith('bookXReaders')->where([
            'book_x_reader.book_id' => $id
        ]);
        $countQueryReader = clone $queryReader;

        $oPagesReader = new Pagination([
            'totalCount' => $countQueryReader->count(),
            'defaultPageSize' => 10,
        ]);
        $aReaders = $queryReader->offset($oPagesReader->offset)
            ->limit($oPagesReader->limit)
            ->all();

        return $this->render('view', [
            'oBook' => $oBook,
            'aAuthors' => $aAuthors,
            'oPagesAuthor' => $oPagesAuthor,
            'aReaders' => $aReaders,
            'oPagesReader' => $oPagesReader,
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $oBook = new Book();
        
        if ($oBook->load(Yii::$app->request->post()) && $oBook->save()) {
            if (isset($_POST['Authors']) && !empty($_POST['Authors']))
            {
                //add Authors
                if (isset($_POST['Authors']['add']))
                {
                    foreach ($_POST['Authors']['add'] as $aData) {
                        if(isset($aData['author_id']) && !empty($aData['author_id']))
                        {
                            $oBookXAuthor = new BookXAuthor();
                            $oBookXAuthor->author_id = (int) $aData['author_id'];
                            $oBookXAuthor->book_id = $oBook->id;

                            $oBookXAuthor->save();
                        }                        
                    }
                }              
            }
            if (isset($_POST['Readers']) && !empty($_POST['Readers']))
            {
                //add Readers
                if (isset($_POST['Readers']['add']))
                {
                    foreach ($_POST['Readers']['add'] as $aData) {
                        if(isset($aData['reader_id']) && !empty($aData['reader_id']))
                        {
                            $oBookXReader = new BookXReader();
                            $oBookXReader->reader_id = (int) $aData['reader_id'];
                            $oBookXReader->book_id = $oBook->id;

                            $oBookXReader->save();
                        }                        
                    }
                }              
            }

            return $this->redirect(['view', 'id' => $oBook->id]);
        } else {
            return $this->render('create', [
                'oBook' => $oBook,
            ]);
        }
    }

    /**
    * Форма добавления нового автора
    * @return mixed
    */
    public function actionAjaxaddauthor()
    {
        $n = (int)$_POST['n'];
        $oAuthor = new Author();
        
        return $this->renderPartial('_author_form', [
            'oAuthor' => $oAuthor,
            'n' => $n,
        ]); 
    }

    /**
    * Форма добавления нового читателя
    * @return mixed
    */
    public function actionAjaxaddreader()
    {
        $k = (int)$_POST['k'];
        $oReader = new Reader();
        
        return $this->renderPartial('_reader_form', [
            'oReader' => $oReader,
            'k' => $k,
        ]); 
    }

    /**
    * список авторов для автокомплита
    * @return json string
    */
    public function actionAjaxauthorslist()
    {
        if (isset($_GET['term'])) {
            $aSphinxAuthors = SphinxAuthor::find()->match($_GET['term'])->all();

            $sId = $this->getSearchIds($aSphinxAuthors);
            if($sId)
            {
                $aAuthors = Author::find()->where('id in ('.$sId.')')->all();
                $aData = [];
                foreach ($aAuthors as $oAuthor) {
                    $aData[$oAuthor->id]['id'] = $oAuthor->id;
                    $aData[$oAuthor->id]['value'] = $oAuthor->name;
                }

                echo json_encode($aData);
            }
        }
    }

    /**
    * список читателей для автокомплита
    * @return json string
    */
    public function actionAjaxreaderlist()
    {
        if (isset($_GET['term'])) {
            $aSphinxReaders = SphinxReader::find()->match($_GET['term'])->all();

            $sId = $this->getSearchIds($aSphinxReaders);
            if($sId)
            {
                $aReaders = Reader::find()->where('id in ('.$sId.')')->all();
                $aData = [];
                foreach ($aReaders as $oReader) {
                    $aData[$oReader->id]['id'] = $oReader->id;
                    $aData[$oReader->id]['value'] = $oReader->name;
                }

                echo json_encode($aData);
            }
        }
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $oBook = $this->findModel($id);

        if ($oBook->load(Yii::$app->request->post()) && $oBook->save()) {
            if (isset($_POST['Authors']) && !empty($_POST['Authors']))
            {
                //echo "<pre>"; print_r($_POST['Authors']); echo "</pre>";exit;

                //delete Authors                   
                $aBookXAuthor = BookXAuthor::find()->where([
                    'book_id' => $oBook->id,
                ])->all();

                if($aBookXAuthor)
                {
                    foreach ($aBookXAuthor as $oBookXAuthor) {
                        $oBookXAuthor->delete();
                    }
                }
                
                //add Authors
                if (isset($_POST['Authors']['add']))
                {
                    foreach ($_POST['Authors']['add'] as $aData) {
                        if(isset($aData['author_id']) && !empty($aData['author_id']))
                        {
                            $oBookXAuthor = new BookXAuthor();
                            $oBookXAuthor->author_id = (int) $aData['author_id'];
                            $oBookXAuthor->book_id = $oBook->id;

                            $oBookXAuthor->save();
                        }                        
                    }
                }           
            }

            if (isset($_POST['Readers']) && !empty($_POST['Readers']))
            {
                //delete Readers                       
                $aBookXReader = BookXReader::find()->where([
                    'book_id' => $oBook->id,
                ])->one();

                if($aBookXReader)
                {
                    foreach ($aBookXReader as $oBookXReader) {
                        $oBookXReader->delete();
                    }
                }

                //add Readers
                if (isset($_POST['Readers']['add']))
                {
                    foreach ($_POST['Readers']['add'] as $aData) {
                        if(isset($aData['reader_id']) && !empty($aData['reader_id']))
                        {
                            $oBookXReader = new BookXReader();
                            $oBookXReader->reader_id = (int) $aData['reader_id'];
                            $oBookXReader->book_id = $oBook->id;

                            $oBookXReader->save();
                        }                        
                    }
                }              
            }  
            return $this->redirect(['view', 'id' => $oBook->id]);
        } else {
            return $this->render('update', [
                'oBook' => $oBook,
            ]);
        }
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($oBook = Book::findOne($id)) !== null) {
            return $oBook;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
