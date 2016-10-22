<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>单一房源信息</title>
        <script type="text/javascript" src="/js/echarts_3.2.3.js"></script>
        <script type="text/javascript" src="/js/jquery-1.12.4.js"></script>
	</head>
	<body>
        房源id：<input type="text" id="house_id" value="" size="50" /><input id="btn_house_id" type="button" value="提交" /><br />
		
		<!-- 为Echarts 准备一个具体大小(宽高)的DOM -->
		<div id="main" style="width: 600px; height: 400px;"></div>
	</body>
    <script type="text/javascript">
        $(document).ready(function(){
            var myEchart = echarts.init(document.getElementById("main"));
			
            $("#btn_house_id").click(function(){
				
				var house_id = $("#house_id").val();
				if(house_id == "") {
					alert("house_id不能为空");
					return;
				}
				
                data = [
                    {
                        name: '2016-10-01',
                        value: ['2016-10-01', 101]
                    },
                    {
                        name: '2016-10-02',
                        value: ['2016-10-02', 102]
                    },
                    {
                        name: '2016-10-03',
                        value: ['2016-10-03', 103]
                    },
                    {
                        name: '2016-10-04',
                        value: ['2016-10-04', 104]
                    },
                    {
                        name: '2016-10-05',
                        value: ['2016-10-05', 105]
                    }
                ];
				
				
				$.post(
				    "/oldhouse/gethouseinfolistbyid",
                    {
						house_id  : house_id
					},
					function(rsp)
					{
						
					},
					'json'
				);
				
				
                /* 指定图表的配置项和数据 */
                var options = {
                    title: {
                        text: "单一房源价格走势"
                    },
                    tooltip: {
                        trigger: 'axis',
                        formatter: function(params) {
                            params = params[0];
                            return params.name + ":" + params.value[1];
                        },
                        axisPointer: {
                            animation: false
                        }
                    },
                    xAxis: {
                        type: 'time',
                        splitLine: {
                            show: true
                        }
                    },
                    yAxis: {
                        type: 'value',
                        boundaryGap: [0, '100%'],
                        splitLine: {
                            show: true
                        }
                    },
                    series: [{
                        name: '房源数据',
                        type: 'line',
                        showSymbol: false,
                        hoverAnimation: false,
                        data: data
                    }]
                };
				
				/* 使用刚指定的配置项和数据显示图表*/
				myEchart.setOption(options);
            });
			
        });
    </script>
</html>