<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class DbController extends Controller
{
   function actionTest1()
   {
   		echo "test-test1";
   }
   
   function actionHello()
   {
   		echo "Hello World";
   }
   
   
   function actionQueryall()
   {
   		$ct = Yii::$app->db->createCommand("select * from country")->queryAll();
   		var_dump($ct);
   }
   
   function actionQueryone()
   {
   		$ct = Yii::$app->db->createCommand("select * from country where code=\"AU\"")->queryOne();
   		var_dump($ct);
   }
   
   function actionQuerycolumn()
   {
   		$names = Yii::$app->db->createCommand("select name from country")->queryColumn();
   		var_dump($names);
   }
   
   function actionQuerycount()
   {
   		$count = Yii::$app->db->createCommand("select count(*) from country")->queryScalar();
   		var_dump($count);
   }
   
   function actionBindqueryone()
   {
   		$ct = Yii::$app->db->createCommand("select * from country where code=:code")->bindValue(":code", "US")->queryOne();
   		var_dump($ct);
   }
   
   function actionBindqueryone2()
   {
   		$params = array(
   				":code"		=> "RU",
   				":name"		=> "Russia",
   		);
   		$ct = Yii::$app->db->createCommand("select * from country where code=:code and name=:name")->bindValues($params)->queryOne();
   		var_dump($ct);
   }
   
   function actionBindqueryone3()
   {
   	$params = array(
   			":code"		=> "FR",
   			":name"		=> "France",
   	);
   	$ct = Yii::$app->db->createCommand("select * from country where code=:code and name=:name", $params)->queryOne();
   	var_dump($ct);
   }
}
