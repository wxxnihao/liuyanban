<?php
    header("Content-type:text/html;charset=utf-8");
	
	include dirname(__FILE__)."/config/config.php";
	/**
	 * 第一步：连接数据库
	 */
	$mysqli = new mysqli(DB_LOCAL_HOST,DB_USER,DB_PASS_WORD,DB_NAME);
	session_start();
	/**
	 * 设置查询结果集编码格式
	 */
	mysqli_query($mysqli, 'set names utf8');
	
	date_default_timezone_set('Asia/Shanghai');
	/**
	 * 获取提交信息
	 */
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$position = $_POST['position'];

	$gender = $_POST['gender'];
	/**
	 * addslashes()特殊字符转义
	 */
	$summary = addslashes($_POST['summary']);
	$role = "customer";
    $time = time();
	$current_time = date("Y-m-d H:i:s",$time);

	$str = $_POST['hobby'];
	$count = count($str);
	$hobby = '';
	for ($i=0;$i<$count;$i++){
	    $hobby.=$str[$i].',';
	}
	//将最后一个逗号删除掉
	$hobby = substr($hobby,0,strlen($hobby)-1);
	
	/**
	 * 上传的文件信息类型
	 */
	$iconhead = $_FILES['iconhead']['name'];
	$type = $_FILES['iconhead']['type'];
	$size = $_FILES['iconhead']['size'];
	$tmp_name = @$_FILES['iconhead']['tmp_name'];
	$error = $_FILES['iconhead']['error'];

	//注册新会员之前需要查询当前会员有无注册过  会员用户名唯一性检测
	$sql2 = "select * from `user` where `username`='".$username."'";
	$bool1 = mysqli_query($mysqli,$sql2);
	$hang = mysqli_num_rows($bool1);
	if ($hang>0) {
		echo "当前会员已注册，请直接登录····";
	} else {
		if($error>0){
	        switch ($error){
	            case 1:
	                echo '超过了php.ini配置文件中的规定大小';
	                break;
	            case 2:
	                echo '超过了表单中的隐藏域的规定大小';
	                break;
	            case 3:
	                echo '文件只有部分被上传';
	                break;
	            case 4:
	                echo '没有上传任何文件';
	                break;
	        }
	        exit();
	    }
	    $array = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif');
	    if(is_array($array)){
	        if(!in_array($type,$array)){
	            echo '请上传jpg,gif,png等类型的图片';
	            exit();
	        }
	    }
		/**
		 * int intval ( mixed $var [, int $base ] )    
		 *      通过使用特定的进制转换（默认是十进制），参数base表示进制，只有当var是字符串时，
		 *      base才会有意义，表示按照base进制来对var进行转换，返回变量 var 的 integer 数值。
		 */
	    if($size>intval(UPLOADS_SIZE)){
	        echo '请上传小于2M的图片';
	        exit();
	    }
	    /**
		 * is_uploaded_file() 函数判断指定的文件是否是通过 HTTP POST 上传的。
		 * 语法:
		 *   is_uploaded_file(file)
		 */
	    if(is_uploaded_file($tmp_name)){
	        if(!is_dir(UPLOAD_DIR)){
	        	echo "创建目录！！！";
	            //mkdir(UPLOAD_DIR);
				mkdir (UPLOAD_DIR,0777,true);
	        }
			/**
			 * explode() 函数把字符串打散为数组。
			 */
	        $arr = explode('.',$iconhead);
			/**
			 * end() 函数将数组内部指针指向最后一个元素，并返回该元素的值（如果成功）。
			 */
	        $ext = end($arr);
			/**
			 * PHP Date() 函数把时间戳格式化为更易读的日期和时间。
			 * mt_rand() 使用 Mersenne Twister 算法返回随机整数。
			 */
	        $newfilename = date('YmdHis').mt_rand(10000,99999).'.'.$ext;
			/**
			 * move_uploaded_file() 函数将上传的文件移动到新位置。
			 * 若成功，则返回 true，否则返回 false。
			 */
	        $bool = move_uploaded_file($tmp_name,UPLOAD_DIR.'/'.$newfilename);
	    }else{
	        echo '请通过POST方式来上传文件';
	    }
	
	    /**
		 * 第二步：创建sql语句
		 */
		$sql = "insert into `user`(`username`,`password`,`role`,`iconhead`,`register_time`,`gender`,`hobby`,`summary`,`position`) 
		        values('".$username."','".$password."','".$role."','".$newfilename."','".$current_time."','".$gender."','".$hobby."','".$summary."','".$position."')";
	    echo $sql;
		$bool = mysqli_query($mysqli, $sql);
		
		if ($bool) {
			
			echo "用户注册成功！！！,<br>";
			$arr = mysqli_affected_rows($mysqli);//添加，删除，修改时才用
			if ($arr>0) {
				/**
				 * 记录当前用户信息
				 */
				$userid = $arr['user_id'];
				$_SESSION['user_id'] = $userid;
				$_SESSION['username'] = $username;
				
				echo "用户名：$username";
				echo "<br>";
				echo "密码：$password";
				echo "<br>";
				echo "性别：$gender";
				echo "<br>";
				echo "职位：$position";
				echo "<br>";
				echo "爱好：$hobby";
				echo "<br>";
				echo "头像：$newfilename";
				echo "<br>";
				echo "个人简介：$summary";
				echo "<br>";
				echo "角色：$role";
				echo "<br>";
				/**
				 * 跳转到主页面
				 */
				header("location:main.php");
			} else {
				echo "数据插入数据库错误！！！！,<br>";
			}
		} else {
			echo $mysqli->errno;
			echo "<br>";
			echo $mysqli->error;
			echo "<br>";
			echo "根据错误信息，检查sql语句。<br>";
			//检查上传文件夹以及文件是否存在，存在则删除
	        if(is_dir(UPLOAD_DIR)){
	            //删除里面的文件
	            $path = UPLOAD_DIR.'/'.$newfilename; //文件路径
	            //unlink 删除文件 如果成功则返回值为I 否则0
	            if(unlink($path)){
	                rmdir(UPLOAD_DIR);
	            }
	        }
		}
	}
	
    
	/**
	 * 关闭数据库
	 */
	mysqli_close($mysqli); 
?>