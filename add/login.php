<?php
	function liOpen(){
		if(isset($_POST['fail'])){
			return "open";
		}
	}

	function divCollapsed(){
		if(!isset($_POST['fail'])){
			return "collapsed";
		}
	}

	function errMsg(){
		if(isset($_POST['fail'])){
			return "<span style='color:red;'>Username or Password is incorrect!</span><br>";
		}
	}

	if(isset($_COOKIE['username'])){
		$_SESSION['username'] = $_COOKIE['username'];
	}
	if(isset($_POST['login'])){
		if(isset($_POST['username']) && isset($_POST['password'])){
			$user = $_POST['username'];
			$pwd = sha1($_POST['password']);

			$query_user = mysqli_query($link,"SELECT * FROM data WHERE username = '$user' AND password = '$pwd' AND status = 1");
			$data_user = mysqli_fetch_array($query_user);
			$row_user = mysqli_num_rows($query_user);

			if($row_user == 1){
				$_SESSION['username'] = $data_user['username'];
				if(isset($_POST['remember'])){
					setcookie("username",$data_user['username'],time()+(86400 * 7),"","",0);
				}
			}
			else{
				$_POST['fail'] = 333;
			}
		}
	}

	if(!isset($_SESSION['username'])){
		echo "

			<li class='dropdown ".liOpen()."'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>Login <i class='icon-angle-down'></i></a>
				<ul class='dropdown-menu dropdown-login'>
					<li>
						<div class='form-login'>
							<div class='login'>
								<div class='inset'>
								<!---start-main-->
									<form method='post' action='$_SERVER[REQUEST_URI]'>
										".errMsg()."
										<div>
											<span><label>Username</label></span>
											<span><input type='text' class='textbox' name='username'></span>
										</div>
										<div>
											<span><label>Password</label></span>
											<span><input type='password' class='password' name='password'></span>
										</div>
										<div>
											<span><input name='remember' type='checkbox'> Remember Me</span>
										</div>
										<div class='sign'>
											<div class='submit'>
												<input type='submit' value='LOGIN' name='login'>
											</div>
											<span class='forget-pass'>
												<a href='/forget-password'>Forgot Password?</a><br>
												<a href='/how-to-get-your-account'>not have an account?</a>
											</span>
											<div class='clear'> </div>
										</div>
									</form>
								<!---//end-main-->
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>";
	}
	else
	{
		echo "
			<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>".$_SESSION['username']." <i class='icon-angle-down'></i></a>
				<ul class='dropdown-menu'>
					<li><a href='' data-toggle='modal' data-target='#changepass'>Change Password</a></li>
					<li><a href='/logout'>Logout</a></li>
				</ul>
			</li>
			";
	}
?>
