<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Test - View</title>
		<script type="text/javascript" src="/js/echarts_3.2.3.js"></script>
		<script type="text/javascript" src="/js/jquery-1.12.4.js"></script>
	</head>
	<body>
		房源id：<input type="text" id="house_id" value="" size="50" /><input id="btn_house_id" type="button" value="提交" />
	   <?php echo $message; ?>
	</body>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#btn_house_id").click(function(){
				alert($("#house_id").val());
			});
		});
	</script>
</html>