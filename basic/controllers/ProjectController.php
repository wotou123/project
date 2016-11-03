<?php
namespace app\controllers;

use yii\web\Controller;									//需求分析
use app\models\Message;
use yii\data\Pagination;			//数据提供的接口类，用于获取分页和数据排序

class ProjectController extends Controller
{
	public $layouts = 'common';
	public $enableCsrfValidation=false;		//CSRF,yii内的安全机制。局部关闭该机制，允许post提交

	//添加数据
	public function actionAdds()
	{
		if(\YII::$app->request->post())     
		{
			$request = \YII::$app->request;
			$message = new Message;
			$message->title = $request->post('title');
			$message->content = $request->post('content');
			$res = $message->save();
			$this->redirect('?=project/adds');
		}else{
			return $this->render('message');		//$content
		}

	}

	//显示页面
	public function actionIndex()
	{
		// $message = new Message;
		$sql = "SELECT * FROM mess";
		$data = \YII::$app->db->createCommand($sql)->queryAll();
		//var_dump($data);
		/**
		 * 1、创建一个数组
		 * 2、把需要传递给视图的数据放到数组中
		 * 3、放到render()；第二个参数中
		 */
		$test = new Message();	//实例化model模型
		$arr = $test->find();
		//$countQuery = clone $arr;
		$pages = new Pagination([
			//'totalCount' => $countQuery->count(),
			'totalCount' => $arr->count(),
			'pageSize'   => 2   		//每页显示条数
		]);
		$data = $arr->offset($pages->offset)
			->limit($pages->limit)
			->all();
		return $this->render('show', [
			'data' => $data,
			'pages'  => $pages
		]);
		return $this->render('show',['data'=>$data,'pages'=>$pages]);

		//return $this->render('show',['data'=>$data]);

		//$sql = "select * from mess";
		//$data = Message::find($sql)->all();		//返回一个数组
	}

	//删除数据
	public function actionDel()
	{
		//$data = \YII::$app->request->get();
		//$message = new Message;
		//$message->find()->where(['id'=>$id])->one();
		//$message->delete();
		//$message =Message::findOne($id);
		//$customer->delete();

		$request = \YII::$app->request;
		$id = $request->get('id','');

		if ( ! $id) 
		{
			die('删除错误');
		}

	    $msgObj = Message::findOne($id);
	    if($msgObj->delete())
	    {
	       echo "Data is deleted";
	    } 

	}

	//数据修改
	public function actionUp()
	{
		$request = \YII::$app->request;
		$id = $request->get('update_id','');

		if ( ! $id) 
		{
			die('修改ID错误');
		}

	    $msgObj = Message::findOne($id);
	    $msgObj->title = $request->get('title');
	    $msgObj->content = $request->get('content');
	    if($msgObj->save())
	    {
	       echo "Data is saved.";
	    } 

	}


}
?>