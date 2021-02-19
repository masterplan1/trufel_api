<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comments;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout'],
//                'rules' => [
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
//    }

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
//        $hash = Yii::$app->getSecurity()->generatePasswordHash('');
//        echo $hash;
//        exit;
        return $this->render('index');
    }
    public function beforeAction($action)
        {
            if (in_array($action->id, ['addcomment'])) {
                $this->enableCsrfValidation = false;
            }
            return parent::beforeAction($action);
        }
    /**
     * Login action.
     *
     * @return Response|string
     */
  
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
//    public function actionContact()
//    {
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
//            Yii::$app->session->setFlash('contactFormSubmitted');
//
//            return $this->refresh();
//        }
//        return $this->render('contact', [
//            'model' => $model,
//        ]);
//    }

    public function actionComment()
    {

        $comments = Comments::find()->orderBy(['id' => SORT_DESC])->all();
        
        return $this->render('comment', compact('comments'));
    }
    public function actionAddcomment(){
        if(Yii::$app->request->isPost){
            $name = Yii::$app->request->post('name');
            $content = Yii::$app->request->post('message');
            
            $comment = new Comments();
            $comment->user_name = $name;
            $comment->content = $content;
            
            if($comment->save()){
                return $this->redirect('/site/comment');
            }
        }else{
            echo 'error';
        }
    }
    public function actionContact()
    {
        return $this->render('contact');
    }
    
}
