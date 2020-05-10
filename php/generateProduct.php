<div class="sngl-top">
    <div class="col-md-5 single-top-left">	
        <div class="flexslider">
            <ul class="slides">
                <li data-thumb="<?php echo $product['firstimg'] ?>">
                    <div class="thumb-image"> <img src="<?php echo $product['firstimg'] ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                </li>
                <li data-thumb="<?php echo $product['secondimg'] ?>">
                    <div class="thumb-image"> <img src="<?php echo $product['secondimg'] ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                </li>
                <li data-thumb="<?php echo $product['thirdimg'] ?>">
                <div class="thumb-image"> <img src="<?php echo $product['thirdimg'] ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                </li> 
            </ul>
        </div>
        <!-- FlexSlider -->
        <script src="../js/imagezoom.js"></script>
        <script defer src="../js/jquery.flexslider.js"></script>
        <link rel="stylesheet" href="../css/flexslider.css" type="text/css" media="screen" />

        <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
        });
        </script>
    </div>	
    <div class="col-md-7 single-top-right">
        <div class="single-para simpleCart_shelfItem">
            <h2><?php echo $product['name']; ?></h2>
            <h5 class="item_price"><?php echo $product['price']; ?></h5>
            <p><?php echo $product['fulldesc'];  ?> </p>
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
                    <li class="size-in">Size<select>
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
            <a href="#" class="add-cart item_add">ADD TO CART</a>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>