<?php
	
	namespace frontend\controllers;

	use Yii;
	use yii\web\Controller;
	use frontend\models\Message;
	use yii\data\Pagination;//分页类
	use yii\db\query;
	use DfaFilter\SensitiveHelper;
	

	

    header("content-type:text/html;charset=utf8");

	class MessageController extends Controller{



		public $enableCsrfValidation = false;

		//登录
		public function actionIndex(){

			if (Yii::$app->request->post()){
            $name=Yii::$app->request->post('name');
            $pwd=Yii::$app->request->post('pwd');

            $query = new Query();
            $res = $query->select(['name', 'pwd'])
                ->from('user')
                ->where(['name' =>$name,'pwd'=>$pwd ])
                ->one();
//            $session=Yii::$app->session;
//            $session->open();
//            $id=$session->get('id');
//            $session->set('id',$res['id']);
            if($res){
                return $this->redirect(['message/show']);
            }else{
                echo "登录失败";
            }
        }else{
            return $this->render('index');
        }


		}
		//展示
		public function actionShow(){

		

			
			$model = new Message();
			$Pagination = new pagination([

				'defaultPageSize'=>2,
				'totalCount'=>$model->find()->count()
				]);
			$list = $model->find()
							->offset($Pagination->offset)
							->limit($Pagination->limit)
							->asArray()
							->all();
			return $this->render('show',['list' => $list,'pagination'=>$Pagination]);
		}



		//添加
		public function actionSave(){

			

			$model = new Message();
			if($model->load(Yii::$app->request->post()) && $model->validate()){
 					//var_dump(Yii::$app->request->post());die;
				$res = $model->save();
				if($res){
					return $this->redirect(['message/show']);
				}
			}else{
				return $this->render('save',['model'=>$model]);
			}


		}

		//删除
		public function actionDel(){
			$id = Yii::$app->request->get('id');
			$model = new Message();
			$res = $model->deleteAll('id=:id',[':id' => $id]);
			if($res){
				return $this->redirect(['message/show']);
			}
		}


		//表单页面
		public function actionUp(){
			     $model = new Message();
			
				 $id = Yii::$app->request->get('id');

			     $model = $model->findOne($id);
					//print_r($model);die;
				
				return $this->render('up',['model'=>$model]);
			
		}
		//修改
		public function actionUpdate()
		{
          $model = new Message();

          $res=yii::$app->request->post('Message');
          $id=$res['id'];
          //print_r($id);die;
          $model=$model->findOne($id);
          $model->name=$res['name'];
          $model->lm=$res['lm'];

          $rest=$model->save();
          if($rest){
             return $this->redirect(['message/show']);
          }
        


		}
		
	}


?>