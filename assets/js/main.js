
$('.reg-btn').click(function (e){
    e.preventDefault();

    let login = $('input[name="login"]').val().replace(/\s+/g, ''),
        password = $('input[name="password"]').val().replace(/\s+/g, ''),
        passConf = $('input[name="passwordConfirm"]').val().replace(/\s+/g, ''),
        email = $('input[name="email"]').val().replace(/\s+/g, ''),
        userName = $('input[name="userName"]').val().replace(/\s+/g, '');

    $('.err').text('');


    let mailReg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    let passReg = /(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])/g;
    let nameReg = /[A-Za-z]/;

    //проверка полей (простите)

    if(login.length<6){
        $('.loginErr').text('invalid login: minimum 6 characters!');
        throw '';
    }
    else if(password.length<6){
        $('.passwordErr').text('invalid password: minimum 6 characters!');
        throw '';
    }
    else if (!passReg.test(password)){
        $('.passwordErr').text('invalid password: Must be numbers and letters!');
        throw '';
    }
    else if (password != passConf){
        $('.passwordConfErr').text('password does not match');
        throw '';
    }
    else if (!mailReg.test(email)){
        $('.emailErr').text('invalid email!');
        throw '';
    }
    else if (userName.length < 2){
        $('.userNameErr').text('invalid name: minimum 2 characters!');
        throw '';
    }
    else if (!nameReg.test(userName)){
        $('.userNameErr').text('invalid name: minimum 2 characters!');
        throw '';
    }
    else {
        $.ajax({
            url: '/signup',
            type: 'POST',
            dataType: 'json',
            data: {
                login: login,
                pass: password,
                email: email,
                userName: userName
            },
            success (data){

                if (data["message"] === "ok"){
                    document.location.href = '/login';
                }
                else {
                    $('.msg').text(data["message"]);
                }
            }
        })
    }
})



$('.login-btn').click(function (e){
    e.preventDefault();

    let login = $('input[name="login"]').val().replace(/\s+/g, ''),
        password = $('input[name="password"]').val().replace(/\s+/g, '');

    $('.err').text('');


    $.ajax({
        url: '/signin',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            pass: password
        },
        success (data){
            if (data["message"] === "ok"){
                document.location.href = '/main';
            }
            else {
                $('.msg').text(data["message"]);
            }
        }
    })
})