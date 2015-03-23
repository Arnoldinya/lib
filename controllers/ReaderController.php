<?php

namespace app\controllers;

use Yii;
use app\models\Reader;
use app\models\Book;
use app\models\SearchReader;
use app\models\SphinxBook;
use app\models\BookXReader;
use app\models\SearchSphinxReader;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * ReaderController implements the CRUD actions for Reader model.
 */
class ReaderController extends BaseController
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
     * Lists all Reader models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchSphinxReader();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reader model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $queryBook = Book::find()->joinWith('bookXReaders')->where([
            'book_x_reader.reader_id' => $id
        ]);
        $countQueryBook = clone $queryBook;

        $oPagesBook = new Pagination([
            'totalCount' => $countQueryBook->count(),
            'defaultPageSize' => 10,
        ]);
        $aBooks = $queryBook->offset($oPagesBook->offset)
            ->limit($oPagesBook->limit)
            ->all();

        return $this->render('view', [
            'oReader' => $this->findModel($id),
            'oPagesBook' => $oPagesBook,
            'aBooks' => $aBooks,
        ]);
    }

    /**
     * Creates a new Reader model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $oReader = new Reader();

        if ($oReader->load(Yii::$app->request->post()) && $oReader->save()) {
            if (isset($_POST['Books']) && !empty($_POST['Books']))
            {
                //add Books
                if (isset($_POST['Books']['add']))
                {
                    foreach ($_POST['Books']['add'] as $aData) {
                        if(isset($aData['book_id']) && !empty($aData['book_id']))
                        {
                            $oBookXReader = new BookXReader();
                            $oBookXReader->book_id = (int) $aData['book_id'];
                            $oBookXReader->reader_id = $oReader->id;

                            $oBookXReader->save();
                        }                        
                    }
                }              
            }
            return $this->redirect(['view', 'id' => $oReader->id]);
        } else {
            return $this->render('create', [
                'oReader' => $oReader,
            ]);
        }
    }

    /**
     * Updates an existing Reader model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $oReader = $this->findModel($id);

        if ($oReader->load(Yii::$app->request->post()) && $oReader->save()) {
            if (isset($_POST['Books']) && !empty($_POST['Books']))
            {
                //delete Books                 
                $aBookXReader = BookXReader::find()->where([
                    'reader_id' => $oReader->id,
                ])->all();

                if($aBookXReader)
                {
                    foreach ($aBookXReader as $oBookXReader) {
                       $oBookXReader->delete();
                    }
                }

                //add Books
                if (isset($_POST['Books']['add']))
                {
                    foreach ($_POST['Books']['add'] as $aData) {
                        if(isset($aData['book_id']) && !empty($aData['book_id']))
                        {
                            $oBookXReader = new BookXReader();
                            $oBookXReader->book_id = (int) $aData['book_id'];
                            $oBookXReader->reader_id = $oReader->id;

                            $oBookXReader->save();
                        }                        
                    }
                }              
            }
            return $this->redirect(['view', 'id' => $oReader->id]);
        } else {
            return $this->render('update', [
                'oReader' => $oReader,
            ]);
        }
    }

    /**
    * Форма добавления новой книги
    * @return mixed
    */
    public function actionAjaxaddbook()
    {
        $n = (int)$_POST['n'];
        $oBook = new Book();
        
        return $this->renderPartial('_book_form', [
            'oBook' => $oBook,
            'n' => $n,
        ]); 
    }

    /**
    * список книг для автокомплита
    * @return json string
    */
    public function actionAjaxbookslist()
    {
        if (isset($_GET['term'])) {
            $aSphinxBooks = SphinxBook::find()->match($_GET['term'])->all();

            $sId = $this->getSearchIds($aSphinxBooks);
            if($sId)
            {
                $aBooks = Book::find()->where('id in ('.$sId.')')->all();
                $aData = [];
                foreach ($aBooks as $oBook) {
                    $aData[$oBook->id]['id'] = $oBook->id;
                    $aData[$oBook->id]['value'] = $oBook->title;
                }

                echo json_encode($aData);
            }
        }
    }

    /**
     * Deletes an existing Reader model.
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
     * Finds the Reader model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reader the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($oReader = Reader::findOne($id)) !== null) {
            return $oReader;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
