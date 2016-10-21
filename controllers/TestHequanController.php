<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Country;

class TestHequanController extends Controller
{
   function actionTest1()
   {
   		echo "test-test1";
   }
   
   function actionHello()
   {
   		echo "Hello World";
   }
   
   function actionGet()
   {
   		$ct = Country::findOne("AU");
   		var_dump($ct);
   }
   
   function actionQueryall()
   {
   		$ct = Yii::$app->db->createCommand("select * from country")->queryAll();
   		var_dump($ct);
   }
   
   function actionLog()
   {
   		Yii::info("info test");
   }
   
   function actionSess()
   {
   		ini_set('session.cookie_domain', '.yii2.stamhe.com');
   		ini_set("session.save_handler", "memcached");
   		ini_set("session.save_path", "127.0.0.1:11211");
   		
   		session_start();
   		echo "<br/>session_id是：" . session_id();
   		echo "<br/>session内容是：";
   		var_dump($_SESSION);
   		if(empty($_SESSION['a'])) {
   			$_SESSION['a'] = uniqid();
   		}
   		
   		echo "<br/>设置后，session内容是：";
   		var_dump($_SESSION);
   }
}
