<?php

	namespace frontend\controllers;

	use Yii;
	use yii\web\Controller;
	use frontend\models\Demo;
	use yii\data\Pagination;//分页类

	class DemoController extends Controller{
		
		
  		public $enableCsrfValidation = false;

			//展示
		public function actionIndex(){
			$model = new Demo();
			$Pagination = new pagination([
				'defaultPageSize'=>2,
				'totalCount'=>$model->find()->count()
				]);
			$list = $model->find()
							->offset($Pagination->offset)
							->limit($Pagination->limit)
							->asArray()
							->all();
			return $this->render('index',['list' => $list,'pagination'=>$Pagination]);
		}





			//添加	
		public function actionAdd(){
			$model= new Demo();
			if(Yii::$app->request->post()){
				$data = Yii::$app->request->post();
				$model->name = $data['name'];
				$model->default = $data['default'];
				$model->leixing = $data['leixing'];
				$model->xuanxiang = $data['xuanxiang'];
				$model->bitian = $data['bitian'];
				$model->yanzheng = $data['yanzheng'];
				$model->small = $data['small'];
				$model->big = $data['big'];
				$res = $model->save();	
				if($res){
					return $this->redirect(['demo/index']);
				}
				}else{
				return $this->render('add');
			}

		}




		//删除
		public function actionDel(){
			$id = Yii::$app->request->get('id');
			$model = new Demo();
			$res = $model->deleteAll('id=:id',[':id' => $id]);
			if($res){
				return $this->redirect(['demo/index']);
			}
		}





	}




?>