function validateForm () {
    // event.preventDefault();
    let firstName = $("#firstName").val();
    let lastName = $("#lastName").val();
    let email = $('#login').val();
    let number = $('#number').val();
    let password1 = $("#password1").val();
    let password2 = $("#password2").val();  

    let pr1 = /^\W+$/.test(firstName);
    let pr2 = /^\W+$/.test(lastName);
    let pr3 = /^\w+[.]?\w+@mail.ru$/i.test(email);
    let pr4 = /^(\+7)(\d{3})(\d{3})(\d{4})$/.test(number);
    let pr5 = password1.length;
    let pr6 = password2.length;

    // let form = document.querySelector('form');

    if (pr1 === false) {
        event.preventDefault();
        $('#firstName').css('margin-bottom', 0);
        $('.warningFirstName').css('display', 'inline-block');
    } else {
        $('#firstName').css('margin-bottom', '20px');
        $('.warningFirstName').css('display', 'none');
    }
    if (pr2 === false) {
        event.preventDefault();
        $('#lastName').css('margin-bottom', 0);
        $('.warningLastName').css('display', 'inline-block');
    } else {
        $('#lastName').css('margin-bottom', '20px');
        $('.warningLastName').css('display', 'none');
    }
    if (pr3 === false) {
        event.preventDefault();
        $('#login').css('margin-bottom', 0);
        $('.warningEmail').css('display', 'inline-block');
    } else {
        $('#login').css('margin-bottom', '20px');
        $('.warningEmail').css('display', 'none');
    }
    if (pr4 === false) {
        event.preventDefault();
        $('#number').css('margin-bottom', 0);
        $('.warningNumber').css('display', 'inline-block');
    } else {
        $('#number').css('margin-bottom', '20px');
        $('.warningNumber').css('display', 'none');
    }

    if (pr5 < 5) {
        event.preventDefault();
        $('#password1').css('margin-bottom', 0);
        $('.warningPassword1').css('display', 'inline-block');
    } else {
        $('#password1').css('margin-bottom', '20px');
        $('.warningPassword1').css('display', 'none');
    }

    if (pr6 < 5) {
        event.preventDefault();
        $('#password2').css('margin-bottom', 0);
        $('.warningPassword2').css('display', 'inline-block');
    } else {
        $('#password2').css('margin-bottom', '20px');
        $('.warningPassword2').css('display', 'none');
    }

    if (pr5 !== pr6) {
        event.preventDefault();
        $('#password2').css('margin-bottom', 0);
        $('.warningPassword').css('display', 'inline-block');
    } else {
        $('.warningPassword').css('display', 'none');
    }

    if (password1 !== password2) {
        event.preventDefault();
        $('.warningPassword').css('display', 'inline-block');
    } else {
        $('.warningPassword').css('display', 'none');
    } 
}

$('#submit').on('click', validateForm);