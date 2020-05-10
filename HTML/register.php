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
					<input placeholder="First name" type="text" name="firstName" id="firstName">
					<p class="warningFirstName">Имя на русском, не более 12 букв</p>
					<input placeholder="Last name" type="text" name="lastName" id="lastName">
					<p class="warningLastName">Фамилия на русском, не более 15 букв</p>
					<input placeholder="Email address" type="text" name="login" id="login">
					<p class="warningEmail">Email вида letters.letters@mail.ru</p>
					<input placeholder="Mobile" type="text" name="number" id="number">
					<p class="warningNumber">Телефон в формате +70000000000</p>
				</div>
				<div class="col-md-6 account-left">
					<input placeholder="Password" type="password" name="password1" id="password1">
					<p class="warningPassword1">Пароль меньше 5 символов</p>
					<input placeholder="Retype password" type="password" name="password2" id="password2">
					<div class="descWarning">
						<p class="warningPassword2">Пароль меньше 5 символов</p>
						<p class="warningPassword">Пароли не совпадают</p>
					</div>
					<!-- <p class="warningPassword2">Пароль не должен быть пустым</p>
					<p class="warningPassword">Пароли не совпадают</p> -->
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="address submit">
				<input type="submit" value="Submit" id="submit">
			</div>
		</form>
	</div>
	<!--register-end-->
	<!--information-starts-->
	<?php require_once 'includes/footer.html' ?>
	<!--footer-end-->	
	<script src="js/totalPriceOfProducts.js"></script>
	<script src="js/validationOfRegistrationForm.js"></script>
</body>
</html>