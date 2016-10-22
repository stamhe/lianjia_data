<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>城市房产数据汇总</title>
        <script type="text/javascript" src="/js/echarts_3.2.3.js"></script>
        <script type="text/javascript" src="/js/jquery-1.12.4.js"></script>
	</head>
	<body>
		目前支持的城市名称：杭州、深圳、成都、厦门、广州、南京 、武汉、北京、重庆<br /><br /><br /><br />
<!--
        城市名称：<input type="text" id="chenshi_name" value="" size="25" /><input id="btn_chenshi_name" type="button" value="提交" /><br />
-->
		
		<!-- 每日在售房源数量趋势 -->
		<div id="id_onsale_count" style="width: 1200; height: 400px;"></div><br />
		<!-- 每日看房人次趋势 -->
        <div id="id_view_last_day" style="width: 1200px; height: 400px;"></div><br />
        <!-- 城市月平均房价趋势 -->
        <div id="id_avg_price" style="width: 1200px; height: 400px;"></div><br />
        <!-- 城市月成交房屋套数趋势 -->
        <div id="id_sold_last_month" style="width: 1200px; height: 400px;"></div><br />
	</body>
    <script type="text/javascript">
    	
        var echarts_onsale_count 	= echarts.init(document.getElementById("id_onsale_count"));
        var echarts_view_last_day	= echarts.init(document.getElementById("id_view_last_day"));
        var echarts_avg_price		= echarts.init(document.getElementById("id_avg_price"));
        var echarts_sold_last_month = echarts.init(document.getElementById("id_sold_last_month"));

        
        $(document).ready(function(){

        /* 每日在售房源数量趋势 */
        var options_onsale_count = {
            title: {
                text: "每日在售房源数量趋势"
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: <?php echo json_encode($data['legend']); ?>
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: <?php echo json_encode($data['onsale_count']['xaxis']); ?>
            },
            yAxis: {
                type: 'value'
            },
            series: <?php echo json_encode($data['onsale_count']['series']); ?>
        };


		echarts_onsale_count.setOption(options_onsale_count);


        /* 每日看房人次趋势 */
        var options_view_last_day = {
            title: {
                text: "每日看房人次趋势"
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: <?php echo json_encode($data['legend']); ?>
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: <?php echo json_encode($data['view_last_day']['xaxis']); ?>
            },
            yAxis: {
                type: 'value'
            },
            series: <?php echo json_encode($data['view_last_day']['series']); ?>
        };


		echarts_view_last_day.setOption(options_view_last_day);


        /* 城市月平均房价趋势 */
        var options_avg_price= {
            title: {
                text: "城市月平均房价趋势"
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: <?php echo json_encode($data['legend']); ?>
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: <?php echo json_encode($data['avg_price']['xaxis']); ?>
            },
            yAxis: {
                type: 'value'
            },
            series: <?php echo json_encode($data['avg_price']['series']); ?>
        };

		echarts_avg_price.setOption(options_avg_price);


        /* 城市月成交房屋套数趋势 */
        var options_sold_last_month= {
            title: {
                text: "城市月成交房屋套数趋势"
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: <?php echo json_encode($data['legend']); ?>
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: <?php echo json_encode($data['sold_last_month']['xaxis']); ?>
            },
            yAxis: {
                type: 'value'
            },
            series: <?php echo json_encode($data['sold_last_month']['series']); ?>
        };

		echarts_sold_last_month.setOption(options_sold_last_month);
			
        });
    </script>
</html>
