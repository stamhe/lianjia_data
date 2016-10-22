<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class OldhouseController extends Controller
{
	public $enableCsrfValidation = false;
	
   function actionOnehouse()
   {
   		return $this->renderPartial("onehouse");
   }
   
   function actionGethouseinfolistbyid()
   {
   		$house_id = $_REQUEST['house_id'];
   		
   		$sql = "select spider_date,price from t_ershoufang_house where house_id=\"{$house_id}\" order by create_time";
   		
   		$ret = Yii::$app->db->createCommand($sql)->queryAll();
   		
   		$data = array();
   		foreach($ret as $house_info)
   		{
   			$data[] = array(
   				"name"	=> $house_info['spider_date'],
   				"value"	=> array($house_info['spider_date'], $house_info['price']),
   			);
   		}
   		
   		/*
   		$data = array(
   			array(
   				'name'	=> '2016-10-01',
   				'value'	=> array('2016-10-01', 101),
   			),
   			array(
   				'name'	=> '2016-10-02',
   				'value'	=> array('2016-10-02', 101),
   			),
   			array(
   				'name'	=> '2016-10-03',
   				'value'	=> array('2016-10-03', 101),
   			),
   			array(
   				'name'	=> '2016-10-04',
   				'value'	=> array('2016-10-04', 110),
   			),
   			array(
   				'name'	=> '2016-10-05',
   				'value'	=> array('2016-10-05', 110),
   			),
   			array(
   				'name'	=> '2016-10-06',
   				'value'	=> array('2016-10-06', 110),
   			),
   			array(
   				'name'	=> '2016-10-07',
   				'value'	=> array('2016-10-07', 110),
   			),
   		);
   		*/
   		
   		build_return(0, "成功", $data);
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
