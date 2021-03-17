var sendPasswordButtonDOM = document.getElementById('forgotButton');
var forgotEmailDOM = document.getElementById('forgotEmail');
var forgotFormDOM = document.getElementById('forgotForm');
var loginForgotButtonDOM = document.getElementById('loginForgot');

var loginLayoutDOM = document.querySelector('.login');
var forgotLayoutDOM = document.querySelector('.forgot');

loginForgotButtonDOM.addEventListener('click',function(){
    loginLayoutDOM.style.display = 'none';
    forgotLayoutDOM.style.display = 'flex';
});

sendPasswordButtonDOM.addEventListener( 'click',function (e) {
    //e.preventDefault();
} );

var forgotPassword = function () {
    const xhr = new XMLHttpRequest();
    xhr.open('post','php/mail.php');
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send( 'email='+forgotEmailDOM.value );
    //console.log(forgotEmailDOM.value);

    xhr.onload = function(){
        let returnedData = xhr.responseText;
        let dataJSON = JSON.parse( returnedData );
        if( dataJSON === 1 ){
            document.querySelector('.forgot__successful').style.display = 'block';
            forgotFormDOM.reset();
            window.setTimeout( function(){
                window.location.href = 'login.php';
            },2000 );
        }else if( dataJSON === -1 ){
            alert( 'Password Not Matched' );
        }else{
            alert( 'Technical Error' );
        }
    }

    return false;

}
