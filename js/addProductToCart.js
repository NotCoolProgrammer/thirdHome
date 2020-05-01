// $(document).ready(function() {
//     $(document).on('click', '.item_add', function (e) {
//         $.get('../goods/goods.json', function (allProducts) {
//             allProducts.forEach(product => {
//                 if (e.currentTarget.id === product.id) {
//                     console.log(product);
//                     //$.post('/checkout', product, function () {
//                     //    console.log("Успешно отправлены данные");
//                     //});

//                     $.ajax({
//                         type: "POST",
//                         url: "php/Basket.php",
//                         data: product,
//                         success: function () {
//                             console.log("Успешно отправлены данные");
//                         }
//                     })
//                 }
//             }); 
//         });
//     })
// })

$(document).ready(function() {
    $(document).on('click', '.item_add', function (e) {
        //получаю продукт не через get запрос, достаю данные с объекта, по которому кликнул
        let object = e.currentTarget;
        let arrayHref = object.offsetParent.firstChild.children[0].pathname.split('/');
        let singleView = arrayHref[2];
        let product = {
            id: object.id,
            price: object.parentNode.innerText,
            name: object.parentNode.parentNode.children[0].textContent,
            desc: object.parentNode.parentNode.children[1].textContent,
            singleView: singleView
        }
        console.log(product);
        // $.ajax({
        //     type: "POST",
        //     url: "/checkout",
        //     data: product,
        //     success: function () {
        //         console.log("Успешно отправлены данные");
        //     }
        // })
        $.post('/checkout', product, function () {
            console.log("Успешно отправлены данные");
        }).fail(function () {
            console.log('Ошибка в передаче данных');
        });
    })
})

