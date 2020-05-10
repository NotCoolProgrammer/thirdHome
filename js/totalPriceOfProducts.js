function setTotalPriceOfAllProductsInCart () {
    let span = document.getElementsByClassName('simpleCart_total'); 
    $.post('/session', {}, function (data) {
        let userSession = JSON.parse(data);
        let userSessionID = userSession.id;
        $.post('/totalPrice', {userSessionID}, function (data) {
            let object = JSON.parse(data);
            let totalPrice = object.sum;
            if (totalPrice == null) {
                totalPrice = 0;
            }
            span[0].innerHTML = totalPrice;
        })
    })
}

setTotalPriceOfAllProductsInCart();