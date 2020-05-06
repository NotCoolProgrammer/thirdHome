<?php include '/index.php'  ?>
<?php require_once 'includes/header.html' ?>
	<!--banner-starts-->
	<div class="bnr" id="home">
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4">
			    <li>
					<img src="images/bnr-1.jpg" alt=""/>
				</li>
				<li>
					<img src="images/bnr-2.jpg" alt=""/>
				</li>
				<li>
					<img src="images/bnr-3.jpg" alt=""/>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>

	<div class="about"> 
		<div class="container">
			<div class="about-top grid-1">
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="images/abt-1.jpg" alt=""/>
						<figcaption>
							<h2>Nulla maximus nunc</h2>
							<p>In sit amet sapien eros Integer dolore magna aliqua</p>	
						</figcaption>			
					</figure>
				</div>
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="images/abt-2.jpg" alt=""/>
						<figcaption>
							<h4>Mauris erat augue</h4>
							<p>In sit amet sapien eros Integer dolore magna aliqua</p>	
						</figcaption>			
					</figure>
				</div>
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="images/abt-3.jpg" alt=""/>
						<figcaption>
							<h4>Cras elit mauris</h4>
							<p>In sit amet sapien eros Integer dolore magna aliqua</p>	
						</figcaption>			
					</figure>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--about-end-->
	<!--product-starts-->
	<div class="product"> 
		<div class="container">
			<div class="product-top" id="product-top">
				<!-- СЮда подгружаются карточки товара -->
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<?php require_once 'includes/footer.html' ?>

	<div class="info__about__add__product__to__cart">
		<p class="notification__text"></p>
		<div class="close__window"><i class="far fa-times-circle"></i></div>
	</div>

	<script>
		let session = "<?php echo $_SESSION['currentUser']; ?>"
	</script>

	<script src="js/responsiveslides.min.js"></script>
	<script src="js/allDopScripts.js"></script>
	<script src="js/generationProducts.js"></script>
	<script src="js/addProductToCart.js"></script>
	<script src="js/totalPriceOfProducts.js"></script>

</body>
</html>