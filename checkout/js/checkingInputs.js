var inputPhoneNumberDOM = document.getElementById('phone');
var inputNameDOM = document.getElementById('name');
var inputAddressDOM = document.getElementById('address');
var inputLandmarkDOM = document.getElementById('landmark');
var inputCityDOM = document.getElementById('city');
var inputPinDOM = document.getElementById('pin');

var selectCountryDOM = document.getElementById('country');
let selectStateDOM = document.getElementById('state');

var order_form = document.getElementById('orderForm');

var order = {};
var order_phone = 0;
var order_name = '';
var order_address = '';
var order_landmark = '';
var order_city = '';
var order_country = '';
var order_state = '';
var order_pin = 0;

var resetInputs = function(){
    window.order = {};
    window.order_phone = 0;
    window.order_name = '';
    window.order_address = '';
    window.order_landmark = '';
    window.order_city = '';
    window.order_country = '';
    window.order_state = '';
    window.order_pin = 0;
}

var checkInput = function(){
    let phone = 0;
    let name = '';
    let address = '';
    let landmark = '';
    let city = '';
    let country = '';
    let state = '';
    let pin = 0;

    phone = inputPhoneNumberDOM.value;
    name = inputNameDOM.value;
    address = inputAddressDOM.value;
    landmark = inputLandmarkDOM.value;
    city = inputCityDOM.value;
    country = selectCountryDOM.selectedOptions[0].textContent;
    state = selectStateDOM.selectedOptions[0].textContent;
    pin = inputPinDOM.value;

    if( phone === 0 || phone < 9999999 ){
        alert( 'Phone Number Entered is wrong' );
        resetInputs();
        return false;
    }

    if( name === '' || name.length <= 3 ){
        alert( 'Name Should be greater than 3 letters' );
        resetInputs();
        return false;
    }

    if( address === '' || address.length <=3 ){
        alert( 'Address Should be greater than 3 letters' );
        resetInputs();
        return false;
    }

    if( city === '' || city.length <=3 ){
        alert( 'City Should be greater than 3 letters' );
        resetInputs();
        return false;
    }

    if( pin === 0 || pin < 99999 ){
        alert( 'Pin Number Entered is wrong' );
        resetInputs();
        return false;
    }
    
    order = {
        cname : name,
        phone : phone,
        address : address,
        landmark : landmark,
        city : city,
        country : country,
        state : state,
        pin : pin
    };
    order.products = products;
    order.cid = cookie.id;
    order.cname = cookie.name;
    order.stateid = selectStateDOM.value;
    return true;

}