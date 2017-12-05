<?php

	namespace frontend\controllers;

	use Yii;
	use yii\web\Controller;
	use frontend\models\Reg;


	class WeekController extends Controller{

		public $enableCsrfValidation = false;

		public function actionIndex(){

			$model = new Reg();
			if(Yii::$app->request->post()){
				$data = Yii::$app->request->post();
				$model->tel = $data['tel'];
				$model->pwd = $data['pwd'];
				$model->qpwd = $data['qpwd'];
				$res = $model->save();

				if($res){
					return $this->redirect('week/regist');
				}
			}else{
				return $this->render('index');
			}	
		}


		public function actionRegist(){

			return $this->render('Regist');
		}













		public function actionRegister(){

			return $this->render('Register');
		}
	}











?>