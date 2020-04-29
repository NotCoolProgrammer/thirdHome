/**
 * Не нужен, товар генерится через пхп
 */
$(document).ready( function() {
    let singleProduct = $("#single-product");
    let addr;
    
    $.get('goods/goods.json', function (allProducts) {
        // allProducts.forEach(product => {
        //     if (product.singleView === addr) {
        //         generateOneProduct(product);
        //     }
        // });
        generateOneProduct(allProducts[0]);
    });
    
    function generateOneProduct (product) {
        let product_wrapper = $(`
            <div class="sngl-top">
                <div class="col-md-5 single-top-left">	
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="images/s-1.jpg">
                                <div class="thumb-image"> <img src="images/s-1.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                            </li>
                            <li data-thumb="images/s-2.jpg">
                                <div class="thumb-image"> <img src="images/s-2.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                            </li>
                            <li data-thumb="images/s-3.jpg">
                            <div class="thumb-image"> <img src="images/s-3.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                            </li> 
                        </ul>
                    </div>
                    <!-- FlexSlider -->
                    <script src="js/imagezoom.js"></script>
                    <script defer src="js/jquery.flexslider.js"></script>
                    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    
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
                        <h2>${product.name}</h2>
                        <h5 class="item_price">${product.price}</h5>
                        <p>${product.fullDesc}</p>
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
                        <a href="/checkout" class="add-cart item_add">ADD TO CART</a>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        `);
        product_wrapper.prependTo(singleProduct);
    }
});
