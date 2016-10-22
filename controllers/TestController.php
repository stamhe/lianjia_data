<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Country;

class TestController extends Controller
{
// 	public $layout = false;
	
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
   
   function actionView()
   {
   		$message = "Hello World";
   		// 渲染一个名为say的视图文件, message参数也被传入视图
//    		return $this->render("say", ['message' => $message]);
		return $this->renderPartial('say', array("message" => $message));
   }
}
