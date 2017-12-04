<?php

namespace app\controllers;

use app\models\Sovet;
use function PHPSTORM_META\elementType;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
     * Displays homepage.
     * Formation of the unloading form
	 * $cite - Cities that are stored in the database
	 * $data - number of remaining records
	 * $manager -
     * @return string
     */

    public function actionIndex()
    {
    	$model= new Sovet();
    	$cite=['Ачинск', 'Красноярск','Абакан'];
		$data=$model->getCount($cite);
		$amo = new \AmoCRM\Client('domain', 'login@gmail.com', 'api');
		$manager=[];
		foreach($amo->account->apiCurrent()['users'] as $user){
			$manager[]=$user['name'];
		}
		array_pop ( $manager );



        return $this->render('index',['model'=>$model,'cite'=>$cite,'manager'=>$manager,'data'=>$data]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
//    public function actionLogin()
//    {
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        }
//        return $this->render('login', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Logout action.
//     *
//     * @return Response
//     */
//    public function actionLogout()
//    {
//        Yii::$app->user->logout();
//
//        return $this->goHome();
//    }
//
//    /**
//     * Displays contact page.
//     *
//     * @return Response|string
//     */
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
//
//    /**
//     * Displays about page.
//     *
//     * @return string
//     */
    public function actionSave()
    {
    	if(Yii::$app->request->post()){
			$model= new Sovet();
			$post=Yii::$app->request->post();
			$cite=['Ачинск', 'Красноярск','Абакан'];
			$amo = new \AmoCRM\Client('new58f5af28dcd74', 'kpksovet@gmail.com', '4703f1526a8e8df353f86d3e526e89ea');

			$manager=[];
			foreach($amo->account->apiCurrent()['users'] as $user){
				$manager[]=$user['id'];
			}
			array_pop ( $manager );
			$post=$post['Sovet'];
			$post['city']=$cite[$post['city']];
			$count=$post['name'];
			$post['manager']=$manager[$post['phone']];
			$data=$model->getContact($count,$post['city']);
			if($model->setContactAmo($data,$post['manager'])){
				if ($model->deletOld($data)) {
					$answer= "<h3>$count контактов выгружено в amoCRM!</h3>";
				} else{
					$answer= "<h3>Выгрузка прошла с ошибкой!</h3>";
				}
			} else {
				$answer= "<h3>Не возможно связаться с amoCRM!</h3>";
			}


		} else {
			$answer='<h3>Ваши даные не пришли!</h3>';
		}


        return $this->render('about',['answer'=>$answer]);
    }
}
