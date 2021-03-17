
paypal.Buttons({
    style: {
        shape: 'rect',
        color: 'black',
        layout: 'horizontal',
        label: 'paypal',
        tagline: true
    },
    createOrder: function(data, actions) {
        if( checkInput() === false ){
            return false;
        }else{
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '1'
                    }
                }]
            });
        }

    },
    onApprove: function(data, actions) {

        order.oID = data.orderID;
        order.payeeID = data.payerID;
        order.status = 'successful';
        order.price = grandTotal+'';

        const xhr = new XMLHttpRequest();
        xhr.open( 'post' , domainPrefix+'checkout/php/makeOrder.php' );
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send( JSON.stringify(order) );
        let returnedData = xhr.responseText;
        let dataJSON = JSON.parse(responseText);

        return actions.order.capture().then(function(details) {
            window.location.href = domainPrefix;
        });
    }
    
}).render('#payment-button');

