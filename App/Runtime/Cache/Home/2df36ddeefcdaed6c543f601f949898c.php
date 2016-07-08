<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
 	<meta name="viewport" content="initial-scale=1.0 width=device-width">
	<title>稻花香里说丰年</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/dspweb.css">
	<!-- <script src="./public/js/require/require.js" data-main="./public/js/main.js"></script>     -->
	<script src="/public/js/avalon/avalon.js" ></script>
	<script type="text/javascript">
		avalon.config({
      paths: {
        jquery: "//cdn.bootcss.com/jquery/2.1.1/jquery.min.js"
      },
      shim: {
        jquery: {
            exports: "jQuery"//这是原来jQuery库的命名空间，必须写上
        }
      }
  	})
		require(['jquery','./validation/validation','./validation/avalon.validation','domReady!'], function($,validation) {
      var test = avalon.define({
          $id: "test",
          $skipArray: ["validation"],
          arr: [{value:1,name:"11111111111",price:199},{value:2,name:"22222222",price:299}],
          selected: 1,
          pay: true,
          beizhu: "",
          name: "",
          money: {
          	get: function(){
          		var arr = this.$model.arr;
          		var selected = this.selected;
          		for(var i =0,len=arr.length;i<len;i++){
          				if( selected == arr[i].value ){
          				return arr[i].price;
          			}
          		}
          		return 'chuwentile';
          	}
          },
          phone: "",
          aid: <?php echo ($aid); ?>,
          validation: validation.getValidationTpl(),
          click: function (e) {
						//e.preventDefault();
						var date = JSON.parse(JSON.stringify(test.$model));
						$.ajax({
							type: "post",
							url: '../Index/postUserActive',
							dataType: 'json',
							data: date,
							success: function(data){
								console.log(data);
								alert(11111);
							},
							fail: function(){
								alert( 22222 );
							}
						});
						// body...
					}
      })
      avalon.scan()
		})
	</script>
	 <style>
      .ms-controller{
          visibility: hidden;
      }
  </style>
</head>
<body>
	<div class="container" ms-controller="test" class="ms-controller" ms-widget="validation">
		<div class="content" >
			<p><img src="http://www.wosuntuan.com/not3files/20160612/14657044365009016.jpg"></p>
			<p><img src="http://www.wosuntuan.com/not3files/20160612/14657044365009016.jpg"></p>
			<p><img src="http://www.wosuntuan.com/not3files/20160612/14657044365009016.jpg"></p>
			<p><img src="http://www.wosuntuan.com/not3files/20160612/14657044365009016.jpg"></p>
			<p><img src="http://www.wosuntuan.com/not3files/20160612/14657044365009016.jpg"></p>
			<div>
				<h2 class="orderInfo">订单信息</h2>
			</div>
			<form name = "daohuaxiang" class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-2 control-label">产品</div>
					<div class="col-sm-10">
					  <div class="radio" ms-repeat="arr">
					  	<label>
					      <input type="radio" name="profucts" ms-value={{el.value}} ms-duplex-string='selected'>
					      {{el.name }} 金额{{el.price}}
					    </label>
					  </div>
					</div>
				</div>
				<div class="form-group">
			    <label for="name" class="col-sm-2 control-label">姓名</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="name" ms-duplex-maxlength-minlength="name" minlength="0" maxlength="20" placeholder="请输入您的姓名">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="phone" class="col-sm-2 control-label">电话</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="phone" ms-duplex-phone="phone" data-duplex-event="change"placeholder="请输入您的电话" />
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="money" class="col-sm-2 control-label">金额</label>
			    <div class="col-sm-2">
			      <input type="text" class="form-control" id="money" ms-duplex="money" readonly />
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <!-- <div class="checkbox">
			        <label>
			          <input type="checkbox"> 记住密码
			        </label>
			      </div> -->
			      <div class="radio">
					    <label>
					      <input type="radio" name="pay" id="pay" value="cod" checked ms-duplex="pay">
					      货到付款
					    </label>
			    	</div>
			    </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-2 control-label">备注</div>
    			<div class="col-sm-10">
    				<textarea class="form-control" rows="3" ms-duplex-maxlength-minlength="beizhu" minlength="0" maxlength="200" placeholder="请输入少于200"></textarea>
    			</div>
  			</div>
					<!-- <div class="form-group">
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
					  </div> -->
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-block btn-success " ms-click="click">提交</button>
				    </div>
				  </div>
			  </form>
		</div>
	</div>
<!-- <script type="text/javascript">
	
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
					console.log(data);
					alert(11111);
				},
				fail: function(){
					alert( 22222 );
				}

			});
			// body...
		}
	});
</script> -->
</body>
</html>