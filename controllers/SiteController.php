<?php

namespace app\controllers;

use app\models\BookForm;
use app\models\Genre;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Book;


class SiteController extends Controller
{
	protected function findModel($id)
	{
		if (($model = Book::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('Запрашиваемая страница не найдена.');
		}
	}

	/*public function getYearsList() {
		$currentYear = date('Y');
		$yearFrom = 2013;
		$yearsRange = range($yearFrom, $currentYear);
		return array_combine($yearsRange, $yearsRange);
	}*/

    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //return $this->render('index');
	    $book=Book::find()->all();

		return $this->render('index',[
			'books'=>$book
		]);
    }

	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		if ($model->load(Yii::$app->request->post()) && $model->save()&& $model->validate()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
		/*if ($model->load(Yii::$app->request->post()) && $model->save()) {
			//debug(Yii::$app->request->post());
			Yii::$app->session->setFlash('success','Данные получены');
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}*/
	}

	public function actionCreate()
	{
		$model=new BookForm();

		if($model->load(Yii::$app->request->post())){
			if($model->save()){
				Yii::$app->session->setFlash('success','Данные получены');
				return $this->redirect(['view', 'id' => $model->id]);
				//return $this->refresh();
			}else{
				Yii::$app->session->setFlash('error'.'Ошибка');
			}
		}
		//return $this->render('book',compact('model'));

		return $this->render('create', [
			'model' => $model,

		]);

	}

	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		return $this->redirect(['index']);
	}
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


  	public function actionBook(){

			if(Yii::$app->request->isAjax){
				debug(Yii::$app->request->post());
				return 'test';
			}

		$model=new BookForm();

			$model_genre=Genre::find()->all();
			foreach ($model_genre as $value){
				$arrGenre[$value->id]=$value->name;
			}
			if($model->load(Yii::$app->request->post())){
				if($model->save()){
					Yii::$app->session->setFlash('success','Данные получены');
					return $this->refresh();
				}else{
					Yii::$app->session->setFlash('error'.'Ошибка');
				}
			}
		//return $this->render('book',compact('model'));

		return $this->render('book', [
			'model' => $model,
		    'arrGenre'=>$arrGenre,
		]);

		/*$book=Book::find()->all();

		return $this->render('book',[
			'books'=>$book
		]);*/
	}

}
