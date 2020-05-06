function setTotalPriceOfAllProductsInCart () {
    $.get('../goods/productsInBasket.json', function (allProducts) {
        console.log(allProducts);
        let span = document.getElementsByClassName('simpleCart_total');
        let totalPrice = Number(span[0].textContent);
        for(let i = 0; i < allProducts.length; i++) {
            totalPrice += Number(allProducts[i].price);
        }
        span[0].innerHTML = totalPrice;
    });
}

setTotalPriceOfAllProductsInCart();