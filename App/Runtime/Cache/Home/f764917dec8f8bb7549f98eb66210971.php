<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
 	<meta name="viewport" content="initial-scale=1.0 width=device-width">
	<title>icp备案信息录入</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/dspweb.css">
	<!-- <script src="./public/js/require/require.js" data-main="./public/js/main.js"></script>     -->
	<script src="/public/js/avalon/avalon.js" ></script>
	<script src="/public/js/jquery/jquery-2.1.1.js" ></script>
	 <style>
    .ms-controller{
        visibility: hidden;
    }
  </style>
</head>
<body>
	<div class="container" ms-controller="icp" class="ms-controller">
		<div class="content" >
			<form name = "icp" class="form-horizontal">
				<div class="form-group">
				    <label for="phone" class="col-sm-2 control-label">网站域名</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="phone" ms-duplex="web" placeholder="请输入您的网站域名">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="phone" class="col-sm-2 control-label">联系电话</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="phone" ms-duplex="phone" placeholder="请输入您的联系电话">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="phone" class="col-sm-2 control-label">备案号码</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="phone" ms-duplex="beian"  placeholder="请输入您的备案号码">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-block btn-success " ms-click="click">提交</button>
				    </div>
				  </div>
			  </form>
		</div>
	</div>
<script type="text/javascript">
	
	var icp = avalon.define({
		$id: 'icp',
		web: '',
		phone: '',
		beian: '',
		click: function (e) {
			e.preventDefault();
			var date = JSON.parse(JSON.stringify(icp.$model));
			$.ajax({
				type: "post",
				url: '../Index/postIcpInfo',
				dataType: 'json',
				data: date,
				success: function(date){
					console.log(date);
					alert(11111);
				},
				fail: function(){
					alert( 22222 );
				}

			});
			// body...
		}
	});
</script>
</body>
</html>