	<?php require_once 'includes/header.html'; ?>
	<!--bottom-header-->
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="/">Home</a></li>
					<li class="active">Register</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--register-starts-->
	<div class="register">
		<form class="container" method="POST" action="/registeredUser">
			<div class="register-top heading">
				<h2>REGISTER</h2>
			</div>
			<div class="register-main">
				<div class="col-md-6 account-left">
					<input placeholder="First name" type="text" tabindex="1" name="firstName" id="firstName" required>
					<input placeholder="Last name" type="text" tabindex="2" name="lastName" id="lastName" required>
					<input placeholder="Email address" type="text" tabindex="3" name="login" id="login" required>
					<input placeholder="Mobile" type="text" tabindex="3" name="number" id="number" required>
				</div>
				<div class="col-md-6 account-left">
					<input placeholder="Password" type="password" tabindex="4" name="password1" id="password1" required>
					<input placeholder="Retype password" type="password" tabindex="4" name="password2" id="password2" required>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="address submit">
				<input type="submit" value="Submit">
			</div>
		</form>
	</div>
	<!--register-end-->
	<!--information-starts-->
	<?php require_once 'includes/footer.html' ?>
	<!--footer-end-->	
</body>
</html>