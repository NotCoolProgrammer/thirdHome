<?php require_once 'includes/header.html' ?>
	<!--bottom-header-->
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="/">Home</a></li>
					<li class="active">Contact us</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--contact-start-->
	<div class="contact">
		<div class="container">
			<div class="contact-top heading">
				<h2>CONTACT</h2>
			</div>
				<div class="contact-text">
				<div class="col-md-3 contact-left">
						<div class="address">
							<h5>Address</h5>
							<p>The company name, 
							<span>Lorem ipsum dolor,</span>
							Glasglow Dr 40 Fe 72.</p>
						</div>
						<div class="address">
							<h5>Address1</h5>
							<p>Tel:1115550001, 
							<span>Fax:190-4509-494</span>
							Email: <a href="mailto:alexandr.tvelenev@mail.ru">alexandr.tvelenev@mail.ru</a></p>
						</div>
					</div>
					<div class="col-md-9 contact-right">
						<form id="feedback" method="POST" id="feedbackForm">
							<div class="common__input__fields">
								<div class="block1">
									<input type="text" placeholder="Name" name="firstName" id="firstName">
									<p class="warning1">Имя на русском, не более 15 букв</p>
								</div>
								<div class="block2">
									<input type="text" placeholder="Phone" name="phone" id="phone">
									<p class="warning2">Телефон в формате +70000000000</p>
								</div>
								<div class="block3">
									<input type="text"  placeholder="Email" name="email" id="email">
									<p class="warning3">Email вида letters.letters@mail.ru</p>
								</div>
							</div>	
							<textarea placeholder="Message" name="message" id="message"></textarea>
							<p class="warning4">Сообщение от 10 букв</p>
							<div class="submit-btn">
								<input type="submit" value="SUBMIT" id="submit" name="submit">
							</div>
						</form>
					</div>	
					<div class="clearfix"></div>
				</div>
		</div>
	</div>
	<!--contact-end-->
	<!--map-start-->

	<div style="width: 100%">
		<iframe width="100%" height="350" src="https://maps.google.com/maps?width=100%&height=600&hl=ru&coord=57.11945962351473,65.58544993400575&q=+(ESOFT)&ie=UTF8&t=&z=16&iwloc=B&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.mapsdirections.info/ru/Круг-Радиус-карта/">Радиус Карта Google</a></iframe>
	</div>
	<br />

	<?php require_once 'includes/footer.html' ?>

	<div class="shadow"></div>
	<script src="js/totalPriceOfProducts.js"></script>
	<script src="js/validationFeedbackForm.js"></script>
</body>
</html>