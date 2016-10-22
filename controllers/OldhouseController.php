<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class OldhouseController extends Controller
{
    private $legend_city = array('杭州', '深圳', '成都', '厦门', '广州', '南京', '武汉', '北京', '重庆');
	public $enableCsrfValidation = false;

   function actionChenshi()
   {
	   	$sql = "select * from t_ershoufang_chenshi order by create_time";
	   	$alldata = Yii::$app->db->createCommand($sql)->queryAll();

        $data = array();
        $data['legend'] = $this->legend_city;

        // 每日在售房源数量
        $onsale_count_xaxis_arr = array();
        $sql1 = "select spider_date from t_ershoufang_chenshi where chenshi_name=\"{$this->legend_city[0]}\" order by spider_date asc";
        $ret1 = Yii::$app->db->createCommand($sql1)->queryAll();
        foreach($ret1 as $v)
        {
            $onsale_count_xaxis_arr[] = $v['spider_date'];
        }

        $onsale_count_series_arr = array();
        foreach($this->legend_city as $chenshi_name)
        {
            $sql2 = "select onsale_count from t_ershoufang_chenshi where chenshi_name=\"{$chenshi_name}\" order by spider_date asc";
            $ret2 = Yii::$app->db->createCommand($sql2)->queryAll();
            $tmp_arr = array();
            foreach($ret2 as $v)
            {
                $tmp_arr[] = $v['onsale_count'];
            }

            $onsale_count_series_arr[] = array(
                'name'  => $chenshi_name,
                'type'  => 'line',
                'stack' => '总量',
                'data'  => $tmp_arr,
            );
        }

        $data['onsale_count'] = array(
            'xaxis'     => $onsale_count_xaxis_arr,
            'series'    => $onsale_count_series_arr,
        );


        // 每日看房人次趋势
        $view_last_day_xaxis_arr = array();
        $sql1 = "select spider_date from t_ershoufang_chenshi where chenshi_name=\"{$this->legend_city[0]}\" order by spider_date asc";
        $ret1 = Yii::$app->db->createCommand($sql1)->queryAll();
        foreach($ret1 as $v)
        {
            $view_last_day_xaxis_arr[] = $v['spider_date'];
        }

        $view_last_day_series_arr = array();
        foreach($this->legend_city as $chenshi_name)
        {
            $sql2 = "select view_last_day from t_ershoufang_chenshi where chenshi_name=\"{$chenshi_name}\" order by spider_date asc";
            $ret2 = Yii::$app->db->createCommand($sql2)->queryAll();
            $tmp_arr = array();
            foreach($ret2 as $v)
            {
                $tmp_arr[] = $v['view_last_day'];
            }

            $view_last_day_series_arr[] = array(
                'name'  => $chenshi_name,
                'type'  => 'line',
                'stack' => '总量',
                'data'  => $tmp_arr,
            );
        }

        $data['view_last_day'] = array(
            'xaxis'     => $view_last_day_xaxis_arr,
            'series'    => $view_last_day_series_arr,
        );

        // 城市月平均房价趋势
        $avg_price_xaxis_arr = array();
        $sql1 = "select spider_date from t_ershoufang_chenshi where chenshi_name=\"{$this->legend_city[0]}\" order by spider_date asc";
        $ret1 = Yii::$app->db->createCommand($sql1)->queryAll();
        foreach($ret1 as $v)
        {
            $avg_price_xaxis_arr[] = $v['spider_date'];
        }

        $avg_price_series_arr = array();
        foreach($this->legend_city as $chenshi_name)
        {
            $sql2 = "select avg_price from t_ershoufang_chenshi where chenshi_name=\"{$chenshi_name}\" order by spider_date asc";
            $ret2 = Yii::$app->db->createCommand($sql2)->queryAll();
            $tmp_arr = array();
            foreach($ret2 as $v)
            {
                $tmp_arr[] = $v['avg_price'];
            }

            $avg_price_series_arr[] = array(
                'name'  => $chenshi_name,
                'type'  => 'line',
                'stack' => '总量',
                'data'  => $tmp_arr,
            );
        }

        $data['avg_price'] = array(
            'xaxis'     => $avg_price_xaxis_arr,
            'series'    => $avg_price_series_arr,
        );

        // 城市月成交房屋套数趋势
        $sold_last_month_xaxis_arr = array();
        $sql1 = "select spider_date from t_ershoufang_chenshi where chenshi_name=\"{$this->legend_city[0]}\" order by spider_date asc";
        $ret1 = Yii::$app->db->createCommand($sql1)->queryAll();
        foreach($ret1 as $v)
        {
            $sold_last_month_xaxis_arr[] = $v['spider_date'];
        }

        $sold_last_month_series_arr = array();
        foreach($this->legend_city as $chenshi_name)
        {
            $sql2 = "select sold_last_month from t_ershoufang_chenshi where chenshi_name=\"{$chenshi_name}\" order by spider_date asc";
            $ret2 = Yii::$app->db->createCommand($sql2)->queryAll();
            $tmp_arr = array();
            foreach($ret2 as $v)
            {
                $tmp_arr[] = $v['sold_last_month'];
            }

            $sold_last_month_series_arr[] = array(
                'name'  => $chenshi_name,
                'type'  => 'line',
                'stack' => '总量',
                'data'  => $tmp_arr,
            );
        }

        $data['sold_last_month'] = array(
            'xaxis'     => $sold_last_month_xaxis_arr,
            'series'    => $sold_last_month_series_arr,
        );

   		return $this->renderPartial("chenshi", array('data' => $data));
   }
	
   function actionOnehouse()
   {
   		return $this->renderPartial("onehouse");
   }
   
   function actionGethouseinfolistbyid()
   {
   		$house_id = $_REQUEST['house_id'];
   		
   		$sql = "select spider_date,price,view_count from t_ershoufang_house where house_id=\"{$house_id}\" order by create_time";
   		
   		$ret = Yii::$app->db->createCommand($sql)->queryAll();
   		
   		$price_list = array();
   		$view_list	= array();
   		foreach($ret as $house_info)
   		{
   			$price_list[] = array(
   				"name"	=> $house_info['spider_date'],
   				"value"	=> array($house_info['spider_date'], $house_info['price']),
   			);
   			
   			$view_list[]	= array(
   				"name"	=> $house_info['spider_date'],
   				"value"	=> array($house_info['spider_date'], $house_info['view_count']),
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
   		);
   		*/
   		
   		$data = array(
   			'price'		=> $price_list,
   			'view'		=> $view_list,
   		);
   		
   		build_return(0, "成功", $data);
   }
   
   
   function actionGetdatabychenshiname()
   {
	   	$chenshi_name = $_REQUEST['chenshi_name'];
	   	 
	   	$sql = "select * from t_ershoufang_chenshi where chenshi_name=\"{$chenshi_name}\" order by create_time";
	   	 
	   	$ret = Yii::$app->db->createCommand($sql)->queryAll();
	   	 
	   	$price_list = array();
	   	$view_list	= array();
	   	foreach($ret as $house_info)
	   	{
	   		$price_list[] = array(
	   				"name"	=> $house_info['spider_date'],
	   				"value"	=> array($house_info['spider_date'], $house_info['price']),
	   		);
	   
	   		$view_list[]	= array(
	   				"name"	=> $house_info['spider_date'],
	   				"value"	=> array($house_info['spider_date'], $house_info['view_count']),
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
	   	 );
	   	*/
	   	 
	   	$data = array(
	   			'price'		=> $price_list,
	   			'view'		=> $view_list,
	   	);
	   	 
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
