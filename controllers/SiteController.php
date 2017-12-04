<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Post;
use app\models\Categoria;
use app\models\User;

class SiteController extends Controller
{
    /**
     * @inheritdoc
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
     * @inheritdoc
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
     *
     *
     *
     */
    public function actionPost($id){
        $post = Post::findOne($id);
        if(!$post){
            echo "Post no encontrado";
            return;
        }

        return $this->render('post',["post"=>$post]);
    }

    public function actionCategoria($id){
        $categoria = Categoria::findOne($id);
        if(!$categoria){
            echo "Post no encontrado";
            return;
        }
        else
            $posts = Post::find()->where(["idCategoria"=>$id])->orderBy("creado DESC")->all();

        return $this->render('categoria',["categoria"=>$categoria, "posts"=>$posts]);
    }

    public function actionUser($id){
        $user = User::findOne($id);
        if(!$user){
            echo "Post no encontrado";
            return;
        }
        else
            $posts = Post::find()->where(["idUser"=>$id])->orderBy("creado DESC")->all();

        return $this->render('user',["user"=>$user,"posts"=>$posts]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $posts = Post::find()->where(["activo"=>1])->orderBy("creado DESC")->all();
        $categorias = Categoria::find()->all();
        $users = User::find()->all();
        return $this->render('index',["posts"=>$posts,"categorias"=>$categorias, "users"=>$users]);
    }



    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
