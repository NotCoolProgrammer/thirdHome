<?php require_once 'includes/header.html' ?>
	<!--bottom-header-->
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="/">Home</a></li>
					<li class="active">Account</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--account-starts-->
	<div class="account">
		<div class="container">
			<div class="account-top heading">
				<h2>ACCOUNT</h2>
			</div>
			<div class="account-main">
				<form class="col-md-6 account-left" method = "POST" action="/auth">
					<h3>Existing User</h3>
					<div class="account-bottom">
						<input placeholder="Email" type="text" tabindex="3" id="login" name="login" required>
						<input placeholder="Password" type="password" tabindex="4" id="password" name="password" required>
						<div class="address">
							<a class="forgot" href="#">Forgot Your Password?</a>
							<input type="submit" value="Login">
						</div>
					</div>
				</form>
				<div class="col-md-6 account-right account-left">
					<h3>New User? Create an Account</h3>
					<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
					<a href="/register">Create an Account</a>
					<a href="/logout" class="logout">LogOut</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--account-end-->
	<!--information-starts-->
	<?php require_once 'includes/footer.html' ?>
	<!--footer-end-->	
</body>
</html>