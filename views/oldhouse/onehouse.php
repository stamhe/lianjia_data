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
		<div id="onehouse_price" style="width: 800px; height: 400px;"></div><br />
        <div id="onehouse_view" style="width: 800px; height: 400px;"></div><br />
	</body>
    <script type="text/javascript">
    	
        var echarts_onehouse_price = echarts.init(document.getElementById("onehouse_price"));
        var echarts_onehouse_view   = echarts.init(document.getElementById("onehouse_view"));
		var data = "";
			
        $(document).ready(function(){
			
            $("#btn_house_id").click(function(){
				
				var house_id = $("#house_id").val();
				if(house_id == "") {
					alert("house_id不能为空");
					return;
				}
				/*
                data = [
                    {
                        name: '2016-10-01',
                        value: ['2016-10-01', 101]
                    },
                    {
                        name: '2016-10-02',
                        value: ['2016-10-02', 102]
                    },
                ];
                */
				
				
				$.post(
				    "/oldhouse/gethouseinfolistbyid",
                    {
						house_id  : house_id
					},
					function(rsp)
					{
						if(rsp.code != 0) {
							alert(rsp.msg);
							return;
						}
						
						price_data    = rsp.data.price;
						view_data     = rsp.data.view;
						
		                /* 指定图表的配置项和数据 */
		                var options_price = {
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
		                        name: '房源价格数据',
		                        type: 'line',
		                        showSymbol: false,
		                        hoverAnimation: false,
		                        data: price_data
		                    }]
		                };
						
						var options_view = {
                            title: {
                                text: "单一房源看房量走势"
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
                                name: '房源看房量',
                                type: 'line',
                                showSymbol: false,
                                hoverAnimation: false,
                                data: view_data
                            }]
                        };
		                
		                /* 使用刚指定的配置项和数据显示图表*/
		                echarts_onehouse_price.setOption(options_price);
                        echarts_onehouse_view.setOption(options_view);
					},
					'json'
				);
				
				
            });
			
        });
    </script>
</html>