function validateForm () {
    event.preventDefault();
    let firstName = $('#firstName').val();
    let pr1 = /^\W+$/.test(firstName);

    let number = $('#phone').val();
    let pr2 = /^(\+7)(\d{3})(\d{3})(\d{4})$/.test(number);

    let email = $('#email').val();
    let pr3 = /^\w+[.]?\w+@mail.ru$/i.test(email);

    let messageLength = $('#message').val().length;
    

    if (pr1 === false || firstName.length > 15) {
        $('.warning1').css('display', 'inline-block');
        $('.common__input__fields').css('margin-bottom', 0);
    } else {
        $('.warning1').css('display', 'none');
        $('.common__input__fields').css('margin-bottom', 20);
    }
    if (pr2 === false) {
        $('.warning2').css('display', 'inline-block');
        $('.common__input__fields').css('margin-bottom', 0);
    } else {
        $('.warning2').css('display', 'none');
    }
    if (pr3 === false) {
        $('.warning3').css('display', 'inline-block');
        $('.common__input__fields').css('margin-bottom', 0);
    } else {
        $('.warning3').css('display', 'none');
    }
    if (messageLength < 10) {
        $('.warning4').css('display', 'inline-block');
        $('#submit').css('margin', 0);
    } else {
        $('.warning4').css('display', 'none');
        $('#submit').css('margin-top', '20px');
    }

    if (pr1 && pr2 && pr3 && messageLength > 10) {
        generateAnswer();
        closeAnswerAfterSomeTime();
        $("#feedback")[0].reset();
    }
}

function generateAnswer() {
    $('.shadow').css('display', 'block');
    let headerClass = $('.top-header'); 
    let answerBlock = $('<div></div>', {
        class: 'answer__block'
    });

    let answerText = $('<p class="answer__text">Ваша заявтка будет оформлена в ближайшее время <br>Ожидайте ответа</p>');
    answerText.appendTo(answerBlock);
    answerBlock.appendTo(headerClass);
}

function closeAnswerAfterSomeTime () {
    setTimeout(() => {
        $('.shadow').css('display', 'none');
        $('.answer__block').remove();
    }, 2500);
}


$('#submit').on('click', validateForm);