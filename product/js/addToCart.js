var leftProductsAddToCardButton = document.getElementById('productAddToCart');

leftProductsAddToCardButton.addEventListener( 'click' , function(){
    if( window.cookie === 0 ){
        //IF USER NOT REGISTERED
        alert( 'Login First' );
    }else{
        let productAvailability = false;

        for(let i = 0 ; i < cartJSON.length ; i++){
            if(cartJSON[i].id == productID){
                productAvailability = true;
            }
        }
        //Product is not in the cart
        if( productAvailability === false ){
            //IF USER IS REGISTERED
            if( attributesID[0] == '-1' ){
                //ITEM IS SIMPLE
                let userID = cookie.id;
                let id = productID;
                let name = productName;
                let image = productImages[0];
                let price = parseFloat(prices[0]);
                let quantity = window.quantity;
                let type = 'single';
                
                const xhr = new XMLHttpRequest();
                xhr.open( 'post', 'php/addToCart.php' );
                xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                
                var dataURL = `id=${id}&name=${name}&image=${image}&price=${price}&quantity=${quantity}&type=${type}&userID=${userID}`;
                
                xhr.send(dataURL);

                xhr.onload = function(){
                    let returnedData = xhr.responseText;
                    let dataJSON = JSON.parse(returnedData);

                    if( dataJSON === 1 ){
                        updateCart();
                    }else{
                        alert('Error in Adding Product');
                    }

                }
                
            }else{
                //ITEM IS VARIABLE
                let userID = cookie.id;
                let id = productID;
                let name = productName;
                let image = productImages[0];
                let price = parseFloat(prices[0]);
                let quantity = window.quantity;
                let type = 'variable';
                
                let aID = attributesID[0];
                let aName = attributes[0].name;
                let aIndex = attributeIndex;
                let aValue = attributes[0].attValues[attributeIndex];
                
                var dataURL = `id=${id}&name=${name}&image=${image}&price=${price}&quantity=${quantity}&type=${type}&userID=${userID}&attributeID=${aID}&attributeName=${aName}&attributeValue=${aValue}&attributeIndex=${aIndex}`;
                const xhr = new XMLHttpRequest();
                xhr.open( 'post', 'php/addToCart.php' );
                xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                
                xhr.send(dataURL);

                xhr.onload = function(){
                    let returnedData = xhr.responseText;
                    let dataJSON = JSON.parse(returnedData);

                    if( dataJSON === 1 ){
                        updateCart();
                    }else{
                        alert('Error in Adding Product');
                    }

                }
                
            }
            
        }else{
            alert('Product is already present in the cart');
        }

    }
} );