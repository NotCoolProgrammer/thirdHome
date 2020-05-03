$(document).ready(function() {
    let hiddenBlock = $('.info__about__add__product__to__cart');
    let windowCloseButton = $('.sizes');

    $(document).on('click', '.item_add', function (e) {
        //получаю продукт не через get запрос, достаю данные с объекта, по которому кликнул
        let object = e.currentTarget;
        let arrayHref = object.offsetParent.firstChild.children[0].pathname.split('/');
        let singleView = arrayHref[2];
        let arrayHrefImg = object.offsetParent.children[0].children[0].children[0].src.split('/');
        let imgSrc = arrayHrefImg[5];
        let product = {
            id: object.id,
            price: object.parentNode.innerText,
            name: object.parentNode.parentNode.children[0].textContent,
            singleView: singleView,
            img: imgSrc 
        };


        // $.post('/', )

        $.post('/checkout', product, function () {
            
        });

        
    
        hiddenBlock.css('display', 'block');

        windowCloseButton.on('click', function () {
            hiddenBlock.css('display', 'none');
        });
        
        setTimeout(() => {
            hiddenBlock.css('display', 'none');
        }, 3500);


    })
})

