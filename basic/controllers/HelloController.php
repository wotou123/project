<?php
namespace app\controllers;		//当前文件所在空间

use yii\web\Controller;				//所使用要继承的空间的Controller类
use yii\web\Cookie;

class HelloController extends Controller
{

	public function actionMessage()
	{
		//$request = YII::$app->request;			//应用主体$app （请求）
		//echo "sadfsdf";

		//$response = \YII::$app->response;		//响应    全局类
		//$response->statusCode = '404';
		//$response->headers->add('pragma','no-cache');
		//$response->headers->set('pragma','max-age=0');		//删除 remove

		//跳转
		//$response->headers->add('location','http://www.baidu.com');
		//$this->redirect('http://www.baidu.com','302');		//易框架跳转方法，该方法是在controller类中，所以$this-> 

		//文件下载
		//$response->headers->add('content-disposition','attachment; filename="a.jpg"');
		//$response->sendFile('./robots.txt');

		$session = \YII::$app->session;
		//开启session
		$session->open();
		//判断session是否开启
		/*if($session->isActive)
		{
			echo "session is active";
		}*/
		//$session->set('user','张三');		//设置保存 session 	保存路径：D:\phpStudy\tmp\tmp
		//echo $session->get('user');				//读取session
		//$session->remove('user');					//删除session
	 //数组方式设置session				通过“ArrayAccess interface”接口实现数组方法
		//$session['user'] = 'zhangsan';
		//echo $session['user'];
		//unset($session['user']);
	}

	public function actionIndex()
	{
		//$cookie = \YII::$app->response->cookies;
		//$arr = array('name'=>'user','value'=>'zhangsi');
		//$cookie->add(new Cookie($arr));
		//$cookie->remove('id');

	 //获取cookie数据
		$cookie = \YII::$app->request->cookies;
		echo $cookie->getValue('user',30);		//如果第一个字段不存在，则返回第二个参数
	}

}
?>