$(document).ready(function() {
    $(document).on('click', '.item_add', function (e) {
        showNotification(e);
        // addProductToCart(e);
    })
})

/**
 * Функция добавления товара в корзину
 */
function addProductToCart(e) {
    let object = e.currentTarget;
    let price = object.parentNode.children[1].children[1].textContent;
    if (!e.currentTarget.offsetParent.classList.contains('product-left')) {
        let singleView = object.parentNode.children[0].dataset.id;
        let arrayHrefImg = object.parentNode.parentNode.parentNode.children[0].children[0].children[0].children[0].children[1].childNodes[1].children[0].src.split('/');
        let imgSrc = arrayHrefImg[6];
        let product = {
            id: object.id,
            price: price,
            name: object.parentNode.parentNode.children[0].children[0].textContent,
            singleView: singleView,
            img: imgSrc
        };
        $.post('/checkout', product);
    } else {
        let arrayHref = object.offsetParent.firstChild.children[0].pathname.split('/');
        let singleView = arrayHref[2];
        let arrayHrefImg = object.offsetParent.children[0].children[0].children[0].src.split('/');
        let imgSrc = arrayHrefImg[5];
        let product = {
            id: object.id,
            price: price,
            name: object.parentNode.parentNode.children[0].textContent,
            singleView: singleView,
            img: imgSrc 
        };
        $.post('/checkout', product);   
    }
}


/**
 * Функция показа уведомления при клике на товар
 */
function showNotification (e) {
    $.post('/session', {}, function (data) {
        let session = JSON.parse(data); 
        if (session) {
            changeProductPrice(e);
            addProductToCart(e);
            let notificationText = $('.notification__text');
            notificationText[0].textContent = 'Товар добавлен в корзину';
            $('.info__about__add__product__to__cart').css('left', '40%');

        } else {
            let notificationText = $('.notification__text');
            notificationText[0].innerHTML = `Вы не авторизованы, полажуйста перейдите по ссылке <a href ="http://myBrand.com/account">http://myBrand.com/account</a>`;
            $('.info__about__add__product__to__cart').css('left', '25%');
        }

        let hiddenBlock = $('.info__about__add__product__to__cart');
        let windowCloseButton = $('.close__window');
        hiddenBlock.css('display', 'block');
        windowCloseButton.on('click', function () {
            hiddenBlock.css('display', 'none');
        });
        setTimeout(() => {
            hiddenBlock.css('display', 'none');
        }, 3500);
    })
}

/**
 * Функция изменения цены товара при клике на корзинку товара
 */
function changeProductPrice (e) {
    let span = document.getElementsByClassName('simpleCart_total');
    let totalPrice = Number(span[0].textContent);
    let priceOfProduct = Number(e.currentTarget.parentNode.children[1].children[1].textContent);
    totalPrice += priceOfProduct;
    span[0].innerHTML = totalPrice;
}