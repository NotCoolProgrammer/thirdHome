// let singleProduct = $("#product-top");



$.get('goods/goods.json', function (allProducts) {
    // allProducts.forEach(product => {
        // if (product.singleView == $adrr) {
            // generateOneProduct(product);
        // });
    // });
    // generateOneProduct(allProducts[0]);
});

function generateOneProduct (product) {
    let product_wrapper = $(`
        <div class="sngl-top">
            <div class="col-md-5 single-top-left">	
                <img src="images/s-1.jpg" alt="">
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
    `);

    // console.log(product_wrapper);
    // product_wrapper.appendTo('#insert_unique_product');
    product_wrapper.insertAfter('#insert_unique_product');

}