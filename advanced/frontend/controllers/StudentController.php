<?php

	namespace frontend\controllers;

	use Yii;
	use yii\web\Controller;
	use frontend\models\Student;
	use yii\data\Pagination;//分页类

	class StudentController extends Controller{
		
		//展示
		public function actionIndex(){
			$model = new Student();
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
		public function actionSave(){

			$model = new Student();
			if($model->load(Yii::$app->request->post()) && $model->validate()){
				if($id = Yii::$app->request->get('id')){
					$model = $model->findOne($id);
					$post = Yii::$app->request->post('Student');
					$model->username = $post['username'];
					$model->sex = $post['sex'];
					$model->age = $post['age'];
					$model->hobby = implode(',',$post['hobby']);
				}else{
					$model->hobby = implode(',', $model->hobby); 
				}
				$res = $model->save();
				
				
				if($res){
					return $this->redirect(['student/index']);
				}
			}else{
				if($id = Yii::$app->request->get('id')){
					$model = $model->findOne($id);
					$model->hobby = explode(',', $model->hobby);
				}
				return $this->render('save',['model' => $model]);
			}
		}

		//删除
		public function actionDelete(){

			$id = Yii::$app->request->get('id');
			$model = new Student();
			$res = $model->deleteAll('id=:id',[':id' => $id]);
			if($res){
				return $this->redirect(['student/index']);
			}
		}


		//修改
		public function actionUpdate(){

			$model = new Student();
			if($model->load(Yii::$app->request->post()) && $model->validate()){
				$model->hobby = implode(',', $model->hobby);
				$res = $model->save();
				if($res){
					return $this->redirect(['student/index']);
				}
			}else{
				if($id = Yii::$app->request->get('id')){

					$model = $model->findOne($id);
					$model->hobby = explode(',', $model->hobby);
				}
				return $this->render('add',['model' => $model]);
			}

		}







	}




?>