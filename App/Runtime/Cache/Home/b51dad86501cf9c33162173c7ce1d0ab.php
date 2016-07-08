<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
 	<meta name="viewport" content="initial-scale=1.0 width=device-width">
	<title>活动页面xxxxx详情</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/dspweb.css">
	<!-- <script src="/public/js/require/require.js" data-main="/public/js/main.js"></script>     -->
	<script src="/public/js/avalon/avalon.js" ></script>
	<script type="text/javascript">
		avalon.config({
      paths: {
        jquery: "http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"
      },
      shim: {
        jquery: {
            exports: "jQuery"//这是原来jQuery库的命名空间，必须写上
        }
      }
  	})
		require(['jquery','./validation/validation','./validation/avalon.validation','domReady!'], function($,validation) {

			// body...
			avalon.log('aa');
      avalon.define({
          $id: "test",
          $skipArray: ["validation"],
          a: "xxxx",
          b: "a",
          c: "d",
          d: "",
          e: "",
          f: "",
          g: "",
          reset: function() {
              validationVM && validationVM.resetAll()
          },
          validation: validation.getValidationTpl(),
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
	<div class="container">
		<div class="content" >
			<p><img src="http://www.wosuntuan.com/not3files/20160612/14657044365009016.jpg"></p>
			<p><img src="http://www.wosuntuan.com/not3files/20160612/14657044365009016.jpg"></p>
			<p><img src="http://www.wosuntuan.com/not3files/20160612/14657044365009016.jpg"></p>
			<p><img src="http://www.wosuntuan.com/not3files/20160612/14657044365009016.jpg"></p>
			<p><img src="http://www.wosuntuan.com/not3files/20160612/14657044365009016.jpg"></p>
<!-- 			<form name="regist" action="/Index/getRegist" >
			  <div class="form-group">
			    <label for="exampleInputEmail1">邮箱：</label>
			    <input type="email" class="form-control" id="email" ms-duplex="" placeholder="请输入您的邮箱地址">
			  </div>
				<div class="form-group">
			    <label for="exampleInputPassword1">密码</label>
			    <input type="password" class="form-control" id="password" placeholder="请输入您的邮箱密码" >
	    	</div>
	    	<button type="submit" class="btn btn-default">注册</button>
			</form> -->
			<form class="form-horizontal" role="form" name="regist" ms-controller="test" ms-widget="validation">
				<div class="form-group">
					<div class="col-sm-2 control-label">产品</div>
					<div class="col-sm-10">
						 <div class="radio">
					    <label>
					      <input type="radio" name="optionsRadios" id="optionsRadios1" value="love" checked>
					      喜欢
					    </label>
					  </div>
					    <div class="radio">
					    <label>
					      <input type="radio" name="optionsRadios" id="optionsRadios2" value="hate">
					      不喜欢
					    </label>
					  </div>
					</div>
				</div>
				<div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">姓名</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="请输入您的姓名">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="phone" class="col-sm-2 control-label">电话</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="phone" ms-duplex-phone="g" data-duplex-event="change"placeholder="请输入您的电话" />
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
					      <input type="radio" name="pay" id="pay" value="cod" checked>
					      喜欢
					    </label>
			    	</div>
			    </div>
			  </div>
			  <div class="form-group">
			  	<div class="col-sm-2 control-label">备注</div>
    			<div class="col-sm-10">
    				<textarea class="form-control" rows="3"></textarea>
    			</div>
  			</div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-block btn-success " >马上购买</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
	<!-- <script type="text/javascript " src="./public/js/main.js"></script> -->
</body>
</html>