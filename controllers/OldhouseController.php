<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class OldhouseController extends Controller
{
   function actionOnehouse()
   {
   		return $this->renderPartial("onehouse");
   }
   
   function actionGethouseinfolistbyid()
   {
   		$house_id = $_REQUEST['house_id'];
   		
   		$sql = "select spider_date,price from t_ershoufang_house where house_id=\"{$house_id}\" order by create_time";
   		
   		$house_list = Yii::$app->db->createCommand($sql)->queryAll();
   		
   		var_dump($house_list);
   }
   
   function actionParam($a = "a1", $b = "b1")
   {
   		var_dump($a);
   		var_dump($b);
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
