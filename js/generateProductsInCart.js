$(document).ready(function () {
    let shoppingBag = $('.in-check');


    $.post('/session', {}, function (data) {
        let userSession = JSON.parse(data);
        let userSessionID = userSession.id;
        $.post('/cart', {userSessionID}, function (data) {
            let allProducts = JSON.parse(data);
            generateProductsInCart(allProducts);
        })
        deleteProducts(userSessionID);
    })

    
    function generateProductsInCart(allProducts) {
        allProducts.forEach(product => {
            let cartHeader = $('<ul></ul>', {
                class: 'cart-header'
            });
            let insideContent = $(`
                <div class="close1" data-id="${product.uniqueid}"> </div>
                <li class="ring-in"><a href="/single/${product.singleview}" ><img src="${product.imgtodisplay}" class="img-responsive cart__img" alt=""></a>
                </li>
                <li><span class="name">${product.name}</span></li>
                <li class="info__about__price"><span class="name__of__the__currency">$</span><span class="cost">${product.price}</span></li>
                
                <p class="info__about__delivery">${product.delivery}</p></li>
                <div class="clearfix"> </div>
            `);
            insideContent.prependTo(cartHeader);
            cartHeader.appendTo(shoppingBag);
        });
    }

    function deleteProducts(userSessionID) {
        $(".in-check").on('click', '.close1', function (e) {
            let idProduct = e.currentTarget.dataset.id;
            let productPrice = e.currentTarget.offsetParent.children[3].children[1].textContent;
            let сurrentPrice = $('.simpleCart_total')[0].textContent;
            let totalPrice = сurrentPrice - productPrice;
            $('.simpleCart_total')[0].innerHTML = totalPrice;
            $.post('/deleteProduct', {idProduct, userSessionID});
            e.currentTarget.offsetParent.remove();
        });
    }
})

