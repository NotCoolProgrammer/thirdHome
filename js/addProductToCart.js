$(document).ready(function() {
    $(document).on('click', '.item_add', function (e) {
        addProductToCart(e);

        showNotification(e);
    })
})

/**
 * Функция добавления товара в корзину
 */
function addProductToCart(e) {
    let object = e.currentTarget;
    let arrayHref = object.offsetParent.firstChild.children[0].pathname.split('/');
    let singleView = arrayHref[2];
    let arrayHrefImg = object.offsetParent.children[0].children[0].children[0].src.split('/');
    let imgSrc = arrayHrefImg[5];
    let product = {
        id: object.id,
        price: object.parentNode.children[1].children[1].textContent,
        name: object.parentNode.parentNode.children[0].textContent,
        singleView: singleView,
        img: imgSrc 
    };

    $.post('/checkout', product);
}


/**
 * Функция показа уведомления при клике на товар
 */
function showNotification (e) {
    //session определена в 3 файлах, где есть продукты (main.php, products.php, single.php)
    let session1 = session;
    let hiddenBlock = $('.info__about__add__product__to__cart');
    let windowCloseButton = $('.close__window');
    if (session1 == "Array") {
        changeProductPrice(e);
        let notificationText = $('.notification__text');
        notificationText[0].textContent = 'Товар добавлен в корзину';
        $('.info__about__add__product__to__cart').css('left', '40%');

    } else {
        let notificationText = $('.notification__text');
        notificationText[0].innerHTML = `Вы не авторизованы, полажуйста перейдите по ссылке <a href ="http://myBrand.com/account">http://myBrand.com/account</a>`;
        $('.info__about__add__product__to__cart').css('left', '25%');
    }

    hiddenBlock.css('display', 'block');

    windowCloseButton.on('click', function () {
        hiddenBlock.css('display', 'none');
    });
    
    setTimeout(() => {
        hiddenBlock.css('display', 'none');
    }, 3500);
}

function changeProductPrice (e) {
    let span = document.getElementsByClassName('simpleCart_total');
    let totalPrice = Number(span[0].textContent);
    let priceOfProduct = Number(e.currentTarget.parentNode.children[1].children[1].textContent);
    totalPrice += priceOfProduct;
    span[0].innerHTML = totalPrice;
    // console.log(totalPrice); 
}