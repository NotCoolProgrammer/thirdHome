$(document).ready(function () {
    let shoppingBag = $('.in-check');
    $.get('../goods/productsInBasket.json', function (allProducts) {
        generateProductsInCart(allProducts);
        deleteProducts(allProducts);
        // rePushProductsToPhp();
    });

    function generateProductsInCart(allProducts) {
        allProducts.forEach(product => {
            let cartHeader = $('<ul></ul>', {
                class: 'cart-header'
            });
            let insideContent = $(`
                <div class="close1" data-id="${product.id}"> </div>
                <li class="ring-in"><a href="/single/${product.singleView}" ><img src="../images/imgToDisplay/${product.imgSrc}" class="img-responsive cart__img" alt=""></a>
                </li>
                <li><span class="name">${product.name}</span></li>
                <li><span class="cost">${product.price}</span></li>
                <li><span>Free</span>
                <p>Delivered in 2-3 business days</p></li>
                <div class="clearfix"> </div>
            `);
            insideContent.prependTo(cartHeader);
            cartHeader.appendTo(shoppingBag);
        });
    }

    function deleteProducts(allProducts) {
        $(".in-check").on('click', '.close1', function (e) {
            e.currentTarget.offsetParent.remove();
            rePushProductsToPhp();
        });
    }

    function rePushProductsToPhp () {
        let object = $(".cart-header");
        // console.log(object);
        for (let i = 0; i < object.length; i++) {
            let arrayHref = object[i].children[1].children[0].children[0].src.split('/');
            let imgSrc = arrayHref[5];
            let singleViewHref = object[i].children[1].children[0].pathname.split('/');
            let singleView = singleViewHref[2];
            let product = {
                id: object[i].children[0].dataset.id,
                price: object[i].children[3].textContent,
                name: object[i].children[2].textContent,
                singleView: singleView,
                img: imgSrc
            };
            $.post('/checkout', product, function () {
                console.log("Успешно отправлены данные");
            }).fail(function () {
                console.log("Данные не были отправлены");
            })
        }
    }
})

