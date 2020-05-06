<?php require_once 'includes/header.html' ?>
	<!--bottom-header-->
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="/">Home</a></li>
					<li class="active">Checkout</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-ckeckout-->
	<div class="ckeckout">
		<div class="container">
			<div class="ckeck-top heading">
				<h2>CHECKOUT</h2>
			</div>
			<div class="ckeckout-top">
				<div class="cart-items">
					<h3>My Shopping Bag</h3>
					<div class="in-check" >
						<ul class="unit">
							<li><span>Item</span></li>
							<li><span>Product Name</span></li>		
							<li><span>Unit Price</span></li>
							<li><span>Delivery Details</span></li>
							<li> </li>
							<div class="clearfix"> </div>
						</ul>
					</div>
				</div>  
			</div>
		</div>
	</div>

	<?php require_once 'includes/footer.html' ?>

	
	<script src="js/responsiveslides.min.js"></script>
	<script src="js/generateProductsInCart.js"></script>
	<script src="js/totalPriceOfProducts.js"></script>
</body>
</html>