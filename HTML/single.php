<?php require_once 'includes/header.html'  ?>
	<!--bottom-header-->
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="/">Home</a></li>
					<li class="active">Single</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-single-->
	<div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-9 single-main-left" id="insert_unique_product">
					<div class="sngl-top">
						<div class="col-md-5 single-top-left">	
							<img src="images/s-1.jpg" alt="">
						</div>	
						<div class="col-md-7 single-top-right">
							<div class="single-para simpleCart_shelfItem">
							<h2>Lorem Ipsum</h2>
							<h5 class="item_price">$ 95.00</h5>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
							<div class="available">
							<ul>
								<li>Color
									<select>
										<option>Silver</option>
										<option>Black</option>
										<option>Dark Black</option>
										<option>Red</option>
									</select>
								</li>
								<li class="size-in">Size
									<select>
										<option>Large</option>
										<option>Medium</option>
										<option>small</option>
										<option>Large</option>
										<option>small</option>
									</select>
								</li>
							<div class="clearfix"> </div>
							</ul>
						</div>
						<a href="/checkout" class="add-cart item_add">ADD TO CART</a>
					</div>
				</div>
				<div class="clearfix"></div>
				</div>
				<div class="latestproducts" id="product-top">
					<!-- Здесь генерируются товары -->
				</div>
			</div>
				<div class="col-md-3 single-right">
					<div class="w_sidebar">
						<section  class="sky-form">
							<h4>Catogories</h4>
							<div class="row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All Accessories</label>
								</div>
								<div class="col col-4">								
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Women Watches</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kids Watches</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Men Watches</label>			
								</div>
							</div>
						</section>
						<section  class="sky-form">
							<h4>Brand</h4>
							<div class="row1 row2 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sonata</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Titan</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Casio</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Omax</label>
									<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>shree</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fastrack</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sports</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fossil</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Maxima</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Yepme</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Citizen</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Diesel</label>			
								</div>
							</div>
						</section>
						<section class="sky-form">
							<h4>discount</h4>
							<div class="row1 row2 scroll-pane">
								<div class="col col-4">
									<label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
								</div>
								<div class="col col-4">
									<label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
								</div>
							</div>						
						</section>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>




	
	<?php require_once 'includes/footer.html' ?>
	
	<!-- <script src="js/allDopScripts.js"></script> -->
	<script src="js/generationProducts.js"></script>
	<script src="js/renderOneProduct.js"></script>
</body>
</html>