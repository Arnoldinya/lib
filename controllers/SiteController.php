<?php

namespace app\controllers;

use Yii;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Book;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        //список книг, находящихся на руках у читателей, и имеющих не менее трех со-авторов.
        $connection = \Yii::$app->db;
        $connection->open();
        $sql = 'select id, title, count(ba.book_id) from book b 
            join book_x_author ba on ba.book_id = b.id 
            join book_x_reader br on br.book_id = b.id 
            group by id, title 
            having count(ba.book_id) >=3
        ';
        $command = $connection->createCommand($sql);
        $aBooks = $command->queryAll();


        //список авторов, чьи книги в данный момент читает более трех читателей.
        $connection = \Yii::$app->db;
        $connection->open();
        $sql = 'select id, name, count(br.book_id) from author a  
            join book_x_author ba on ba.author_id = a.id 
            join book_x_reader br on br.book_id = ba.book_id 
            group by id, name 
            having count(br.book_id) >=3
        ';
        $command = $connection->createCommand($sql);
        $aAuthors = $command->queryAll();       

        //Вывод пяти случайных книг.
        $connection = \Yii::$app->db;
        $connection->open();
        $sql = 'select count(id) c from book';
        $command = $connection->createCommand($sql);
        $aData = $command->queryOne();

        //кол-во всех записей в таблице
        $iCountRow = $aData['c'];

        $iRandId = rand(1, $iCountRow);
        $n = 0;
        $aId = [];
        while ($n < 5) {
            //проверка, есть ли такая запись
            $connection = \Yii::$app->db;
            $connection->open();
            $sql = "select id from book where id = ".$iRandId;
            $command = $connection->createCommand($sql);
            $aExist = $command->queryOne();

            if($aExist)
            {
                $aId[] = $iRandId;
                $n++;
                $iRandId = rand(1, $iCountRow);
            }
        }

        $aRandBooks = [];
        if($aId)
        {
            $connection = \Yii::$app->db;
            $connection->open();
            $sql = 'select id, title from book where id in('.implode(', ', $aId).')';
            $command = $connection->createCommand($sql);
            $aRandBooks = $command->queryAll();
        }

        return $this->render('index', [
            'aBooks' => $aBooks,
            'aAuthors' => $aAuthors,
            'aRandBooks' => $aRandBooks,
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
