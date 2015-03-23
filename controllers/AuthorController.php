<?php

namespace app\controllers;

use Yii;
use app\models\Author;
use app\models\SearchAuthor;
use app\models\BookXAuthor;
use app\models\Book;
use app\models\SphinxBook;
use app\models\SearchSphinxAuthor;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * AuthorController implements the CRUD actions for Author model.
 */
class AuthorController extends BaseController
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
     * Lists all Author models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchSphinxAuthor();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Author model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $queryBook = Book::find()->joinWith('bookXAuthors')->where([
            'book_x_author.author_id' => $id
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
            'oAuthor' => $this->findModel($id),
            'oPagesBook' => $oPagesBook,
            'aBooks' => $aBooks,
        ]);
    }

    /**
     * Creates a new Author model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $oAuthor = new Author();

        if ($oAuthor->load(Yii::$app->request->post()) && $oAuthor->save()) {
            if (isset($_POST['Books']) && !empty($_POST['Books']))
            {
                //add Books
                if (isset($_POST['Books']['add']))
                {
                    foreach ($_POST['Books']['add'] as $aData) {
                        if(isset($aData['book_id']) && !empty($aData['book_id']))
                        {
                            $oBookXAuthor = new BookXAuthor();
                            $oBookXAuthor->book_id = (int) $aData['book_id'];
                            $oBookXAuthor->author_id = $oAuthor->id;

                            $oBookXAuthor->save();
                        }                        
                    }
                } 
            }
            return $this->redirect(['view', 'id' => $oAuthor->id]);
        } else {
            return $this->render('create', [
                'oAuthor' => $oAuthor,
            ]);
        }
    }

    /**
     * Updates an existing Author model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $oAuthor = $this->findModel($id);

        if ($oAuthor->load(Yii::$app->request->post()) && $oAuthor->save()) {
            if (isset($_POST['Books']) && !empty($_POST['Books']))
            {
                //delete Books                   
                $aBookXAuthor = BookXAuthor::find()->where([
                    'author_id' => $oAuthor->id,
                ])->all();

                if($aBookXAuthor)
                {
                    foreach ($aBookXAuthor as $oBookXAuthor) {
                        $oBookXAuthor->delete();
                    }
                }

                //add Books
                if (isset($_POST['Books']['add']))
                {
                    foreach ($_POST['Books']['add'] as $aData) {
                        if(isset($aData['book_id']) && !empty($aData['book_id']))
                        {
                            $oBookXAuthor = new BookXAuthor();
                            $oBookXAuthor->book_id = (int) $aData['book_id'];
                            $oBookXAuthor->author_id = $oAuthor->id;

                            $oBookXAuthor->save();
                        }                        
                    }
                }              
            }

            return $this->redirect(['view', 'id' => $oAuthor->id]);
        } else {
            return $this->render('update', [
                'oAuthor' => $oAuthor,
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
     * Deletes an existing Author model.
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
     * Finds the Author model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Author the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($oAuthor = Author::findOne($id)) !== null) {
            return $oAuthor;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
