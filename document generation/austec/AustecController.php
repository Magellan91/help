<?php

namespace app\controllers;


use app\models\Austec;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\YiiAsset;


class AustecController extends Controller
{

	public $layout='admin.php';
	
	public function behaviors()
	{
		return [
			'access'=>[
				'class'=>AccessControl::className(),
				'only'=>['logout'],
				'rules'=>[
					[
						'actions'=>['logout'],
						'allow'=>true,
						'roles'=>['@'],
					],
				],
			],
			'verbs'=>[
				'class'=>VerbFilter::className(),
				'actions'=>[],
			],
		];
	}

	public function actions()
	{
		return [
			'error'=>['class'=>'yii\web\ErrorAction',],
			'captcha'=>[
				'class'=>'yii\captcha\CaptchaAction',
				'fixedVerifyCode'=>YII_ENV_TEST?'testme':null,
			],
		];
	}

	public function beforeAction($action)
	{

		if($action->id==='index')
		{
			$this->enableCsrfValidation=false;
		}
		
		return parent::beforeAction($action);
	}



	public function actionIndex()
	{
		$austec= new Austec();

		return $this->render('index',['model'=>$austec,]);
	}









	public function actionSave()
	{
		$this->layout='word.php';
		$post=Yii::$app->request->post();
		$invoicingModel=$post['Invoicing']['invoicing_info'];
		$count=count($invoicingModel['servis']);
		$tempData=[];
		for($i=0;$i<$count;$i++)
		{
			$tempData[$i]=[
				$invoicingModel['servis'][$i],
				$invoicingModel['cost'][$i]
			];
		}

		$div=$this->render('showdoxs.php',[
			'model'=>$invoicingModel,
			'data'=>$tempData,
		]);
		header("Pragma: no-cache");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment; filename=\"Invoicing.doc");
		header("Content-Transfer-Encoding: binary");
		ob_clean();
		flush();
		echo $div;
		Yii::$app->end();
	}


}