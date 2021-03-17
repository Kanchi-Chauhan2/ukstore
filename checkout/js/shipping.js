let countrySelectDOM = document.getElementById('country');
let stateSelectDOM = document.getElementById('state');
var shippingDOM = document.getElementById('shipping');
var shippingCost = -1;
let countryJSON = {};


fetch('../json/countries+states.json').
then( req => {return req.json()} ).
then( data => {
    countryJSON = data;
    for( let i = 0 ; i < data.length ; i++ ){
        let option = document.createElement('option');
        option.value = i;
        option.textContent = data[i].name;
        countrySelectDOM.appendChild(option);

        if( i === 0 ){
            let states = data[i].states;
            for( let j = 0 ; j < states.length ; j++ ){
                let o = document.createElement('option');
                o.textContent = states[j].name;
                o.value = states[j].id;
                stateSelectDOM.appendChild(o);
            }
            shipping();
        }

    }
} );

stateSelectDOM.addEventListener('change',function(){
    shipping();
});

var shipping = function(){
    let sid = stateSelectDOM.value;
    const xhr = new XMLHttpRequest();
    xhr.open('post','php/shippingPrice.php');
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send( 'sid='+sid );

    xhr.onload = function(){
        let returnedText = xhr.responseText;
        let dataJSON = JSON.parse(returnedText);
        let shippingPrice = parseFloat(dataJSON);
        
        shippingCost = shippingPrice;
        grandTotal = subTotal + shippingPrice;
        grandTotalDOM.textContent = currency+(subTotal+shippingPrice);
        shippingDOM.textContent = currency+shippingPrice;
    }
}

countrySelectDOM.addEventListener('change',function(){
            
    if( stateSelectDOM.childElementCount <= 0 ){
        
    }else{
        Array.from(stateSelectDOM.children).forEach( (o) => {
            o.parentElement.removeChild(o);
        } );
    }

    let states = countryJSON[parseInt(countrySelectDOM.value)].states;

    if( states.length <= 0 ){
        let o = document.createElement('option');
        o.textContent = '------------';
        o.value = -1;
        stateSelectDOM.appendChild(o);
    }

    for( let j = 0 ; j < states.length ; j++ ){
        let o = document.createElement('option');
        o.textContent = states[j].name;
        o.value = states[j].id;
        stateSelectDOM.appendChild(o);
    }
    shipping();

});

