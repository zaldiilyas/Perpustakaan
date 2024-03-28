
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v1 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/login.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="img/lbr.gif" alt="">
				</div>
                <form class="register" action="/register" method="POST">
                    @method('post')
                    @csrf
					<h3>Registration</h3>
                    <div class="form-wrapper">
                        <input type="text" placeholder="Name" name="name" required class="form-control">
						<i class="zmdi zmdi-account"></i>
                    </div>
					<div class="form-wrapper">
                        <input type="email" placeholder="Email" name="email" required class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
                        <input type="password" placeholder="Password" name="password" required class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">Register Now</span>
                        <i class="button__icon bx bx-right-arrow-alt"></i>
                    </button>			
                    <center>
                        <div class="social-login">
                            <a href="/login" class="social-login__icon">Login <i class="bx bx-right-arrow-alt"></i></a>
                        </div>
                    </center>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>