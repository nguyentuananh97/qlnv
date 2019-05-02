<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="public/login/lg_images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="public/login/lg_vendor/bootstrap/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="public/login/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/login/lg_fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/login/lg_vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="public/login/lg_vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/login/lg_vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/login/lg_css/util.css">
	<link rel="stylesheet" type="text/css" href="public/login/lg_css/main.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="public/login/lg_images/img-01.png" alt="IMG">
				</div>

				<form action="?act=auth" method="post" class="login100-form validate-form">
					<span class="login100-form-title">
						Đăng nhập
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Email phải có định dạng: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Mật khẩu không được trống">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit">
							Đăng nhập
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Quên
						</span>
						<a class="txt1" href="" data-title="forget" data-toggle="modal" data-target="#forget" >
							mật khẩu?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2"  href="" data-title="Signup" data-toggle="modal" data-target="#signup" >
							Đăng kí
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="forget" tabindex="-1" role="dialog" aria-labelledby="forget" aria-hidden="true">
    	<div class="modal-dialog">
		    <div class="modal-content">
	          	<div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
		          <h4 class="modal-title custom_align" id="Heading">Quên mật khẩu</h4>
	    		</div>
		        <div class="modal-body">
			        <form action="?mod=auth&act=email" method="post" id="insert_form">
			        	<div class="form-group">
			                <label for="">Mã nhân viên</label>
			                <input type="text" class="form-control" placeholder="Nhập mã nhân viên..." name="code_forget" required >
			            </div> 
			            <div class="form-group">
			                <label for="">Email</label>
			                <input type="email" class="form-control" placeholder="Nhập email của bạn! Chúng tôi sẽ gửi mật khẩu về email..." name="email_forget" required >
			            </div>         
			            <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign "></span>Confirm</button>

			        </form>
		        </div>
    		</div>
    		<!-- /.modal-content --> 
  		</div>
    	<!-- /.modal-dialog --> 
	</div>
</body>

	
<!--===============================================================================================-->	
	<script src="public/login/lg_vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="public/login/lg_vendor/bootstrap/js/popper.js"></script>
	<!-- <script src="public/lg_vendor/bootstrap/js/bootstrap.min.js"></script> -->
	<script src="public/login/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="public/login/lg_vendor/select2/select2.js"></script>
	<script src="https://www.google.com/recaptcha/api.js?hl=vi"></script>
<!--===============================================================================================-->
	<script src="public/login/lg_vendor/tilt/tilt.jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="public/login/lg_js/main.js"></script>
</html>
<?php 
	if (isset($_COOKIE['check'])) {
    	echo"<script language='javascript'>
	    		$(document).ready(function() {
	                swal(
						'Email hoặc mật khẩu không chính xác!',
						'Click vào nút!',
						'error'
					)
				})
            </script>";
       
    }
    setcookie('check', 'ok', time() - 10);

 ?>
 <?php 
 	if (isset($_COOKIE['msg_sendemail'])) {
    	echo"<script language='javascript'>
	    		$(document).ready(function() {
	                swal(
						'Đã gửi mật khẩu vào email của bạn!',
						'Click vào nút!',
						'success'
					)
				})
            </script>";
       
    }
    setcookie('msg_sendemail', 'ok', time() - 10);
  ?>
