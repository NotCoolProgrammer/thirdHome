let productBlock = $('#product-top');

$.get('goods/goods.json', function (allProducts) {
    generateProducts(allProducts);
})

function generateProducts (allProducts) {
    allProducts.forEach(product => {
        if ($('#product-top').hasClass('col-md-9')) {
            productBlock[0].innerHTML += `
            <div class="col-md-4 product-left">
                <div class="product-main simpleCart_shelfItem">
                    <a href="/single/${product.singleView}" class="mask"><img class="img-responsive zoom-img" src="${product.img[0].imgToDisplay}" alt="" /></a>
                    <div class="product-bottom">
                        <h3>${product.name}</h3>
                        <p>${product.desc}</p>
                        <h4><a class="item_add" href="/checkout" id ="${product.id}"><i></i></a> <span class=" item_price">${product.price}</span></h4>
                    </div>
                </div>
            </div>
            `;
        } else {
            productBlock[0].innerHTML += `
            <div class="col-md-3 product-left">
                <div class="product-main simpleCart_shelfItem">
                    <a href="/single/${product.singleView}" class="mask"><img class="img-responsive zoom-img" src="${product.img[0].imgToDisplay}" alt="" /></a>
                    <div class="product-bottom">
                        <h3>${product.name}</h3>
                        <p>${product.desc}</p>
                        <h4><a class="item_add" href="/checkout" id ="${product.id}"><i></i></a> <span class=" item_price">${product.price}</span></h4>
                    </div>
                </div>
            </div>
            `;
        }   
    });
}