<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="css/bootstrap.css" />
    
    <!--<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
	<link rel="stylesheet" href="style/login.css" />
	<title>注册页面</title>
</head>
<body>
	<div class="container">
		<div class="row">
			 <div class="span4">
			 	
			 	<form class="form-horizontal" action="registerDo.php" method="post" enctype="multipart/form-data">
			 		<legend>注册</legend>
			 	    <div class="form-group">
					    <label for="username" class="col-sm-3 control-label">用户名:</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control username" name="username" id="username"  placeholder=""/>
					    </div>
					</div>
					<div class="form-group">
					    <label for="password" class="col-sm-3 control-label">密码:</label>
					    <div class="col-sm-9">
					      <input type="password" class="form-control password" name="password" id="password" placeholder=""/>
					    </div>
					</div>
			 	    <div class="form-group">
			 	    	<label for="gender" class="col-sm-3 control-label">性别:</label>
			 	    	<label class="radio-inline">
						   <input type="radio" name="gender" class="gender" value="男" checked="checked">男
						</label>
						<label class="radio-inline">
						   <input type="radio" name="gender" class="gender" value="女">女
						</label>

			 	    </div>
				    
				    <div class="form-group">
				    	<label for="inputPassword3" class="col-sm-3 control-label">职位:</label>
				    	<div class="col-sm-6">
				    		<input type="hidden" name="position" id="position"/>
				    		<select class="form-control position">
								<option>三先天</option>
								<option>弃天帝</option>
								<option>剑君十二恨</option>
								<option>疏楼龙秀</option>
								<option>剑子</option>
							</select>
				    	</div>
				    </div>
				    <div class="form-group">
				    	<label for="inputPassword3" class="col-sm-3 control-label">爱好:</label>
				    	<div class="col-sm-9">
				    		<label class="checkbox-inline">
							   <input type="checkbox" name="hobby[]" class="hobby" value="吃" checked="checked">吃
							</label>
							<label class="checkbox-inline">
							   <input type="checkbox" name="hobby[]" class="hobby" value="喝">喝
							</label>
							<label class="checkbox-inline">
							   <input type="checkbox" name="hobby[]" class="hobby" value="玩儿">玩儿
							</label>
							<label class="checkbox-inline">
							   <input type="checkbox" name="hobby[]" class="hobby" value="乐">乐
							</label>
							<label class="checkbox-inline">
							   <input type="checkbox" name="hobby[]" class="hobby" value="K歌">K歌
							</label>
							<label class="checkbox-inline">
							   <input type="checkbox" name="hobby[]" class="hobby" value="睡觉">睡觉
							</label>
							<label class="checkbox-inline">
							   <input type="checkbox" name="hobby[]" class="hobby" value="烫头">烫头
							</label>
				    	</div>
				   </div>
				    <div class="form-group">
				  	    <label for="inputPassword3" class="col-sm-3 control-label">头像:</label>
				        <div class="col-sm-8">
				    	    <input type="file" name="iconhead" class="iconhead">
				    	    <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
				    
				        </div>
				    </div>
				    <div class="form-group">
				  	    <label for="inputPassword3" class="col-sm-3 control-label">个人简介:</label>
				        <div class="col-sm-8">
				    	    <textarea class="form-control textarea" name="summary" rows="3"></textarea>
				        </div>
				    </div>
<!-- 				    
				    <div class="form-group">
					     <label for="inputPassword3" class="col-sm-3 control-label">Remember me?:</label>
					      <div class="col-sm-8">
					        <label class="checkbox-inline">
							   <input type="checkbox" id="inlineCheckbox3" value="option3"> Remember me.
							</label>
					      </div>
					    </div>
				    </div> -->
				    <div class="form-group">
				    	<label for="inputPassword3" class="col-sm-3 control-label"></label>
					    <div class="col-sm-8">
					    	<a class="help-block" href="login.php">注册完成，去登陆</a>
					    </div>	
				    </div>
				   
					<div class="form-group">
					    <div class="col-sm-offset-3 col-sm-6">
					      <button type="submit" class="btn btn-primary btn-lg">注册</button>
					    </div>
					</div>    
				</form>
			</div>
		</div>
    </div>
    <script src="js/register.js" charset="UTF-8"></script>
</body>
</html>