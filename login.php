<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="css/bootstrap.css" />
	
	<link rel="stylesheet" href="style/login.css" />
	<title>登录注册</title>
</head>
<body>
	<div class="container">
		<div class="row">
			 <div class="span4">
			 	<form action="loginDo.php" method="post" class="form-horizontal">
			 		<legend>登录</legend>
			 		<div class="form-group">
					    <label for="inputEmail3" class="col-sm-3 control-label">用户名:</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="username" id="inputEmail3"  placeholder="">
					    </div>
					</div>
					<div class="form-group">
					    <label for="inputPassword3" class="col-sm-3 control-label">密码:</label>
					    <div class="col-sm-9">
					      <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="">
					    </div>
					</div>
					<div class="form-group">
					     <label for="inputPassword3" class="col-sm-3 control-label"></label>
					      <div class="col-sm-8">
					        <label class="checkbox-inline">
							   <input type="checkbox" id="inlineCheckbox3" value="option3"> 记住我.
							</label>
					      </div>
					    </div>
				    </div>
				    <div class="form-group">
				    	<label for="inputPassword3" class="col-sm-3 control-label"></label>
					    <div class="col-sm-8">
					    	<a class="help-block" href="register.php">尚未注册，去注册</a>
					    </div>	
				    </div>
				    <div class="form-group">
					    <div class="col-sm-offset-3 col-sm-6">
					      <button type="submit" class="btn btn-primary btn-lg" href="addBoard.php">登录</button>
					    </div>
					</div>  
				</form>
			 </div>
		</div>	
    </div>
</body>
</html>