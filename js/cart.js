cartJSON = 0;

let cartDOM = document.querySelector('.cart');
let headerCartButtonDOM = document.querySelector('.header__menu--cart');
let cartCloseButtonDOM = document.querySelector('.cart__close');

let mobileCartButtonDOM = document.querySelector('.header__top--cart');
let mobileCartMenu = false;

let cartURL = domainPrefix+'/php/cart.php';
let updateCartURL = domainPrefix+'/php/updateCart.php';
let cartProductsContainerDOM = document.querySelector('.cart__products');
let cartTotalPriceDOM = document.querySelector('.cart__final--price');
let cartProductAddButtons = document.getElementsByClassName('cart__product--quantity__plus');
let cartProductMinusButtons = document.getElementsByClassName('cart__product--quantity__minus');
let cartProductQuantityNumber = document.getElementsByClassName('cart__product--quantity__number');

var updateCart = function(){
    if( cookie === 0 || cookie === undefined ){
        console.log('Login First');
    }else{
        const xhr = new XMLHttpRequest();
        xhr.open( 'post', cartURL );
        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xhr.send('');
        
        if(document.getElementsByClassName('cart__product')){
            let allProducts = document.getElementsByClassName('cart__product');
            Array.from(allProducts).forEach((product,index)=>{
                cartProductsContainerDOM.removeChild(product);
            });
        }

        xhr.onload = function(){
            let returnedDATA = xhr.responseText;
            let dataJSON = JSON.parse(returnedDATA);
            cartJSON = dataJSON;

            //--------------------CHECK WHETHER CHECKOUT PAGE OR NOT----------------------

            if( document.querySelector('.checkout') ){
                updateCheckoutCart();
            }

            let totalPrice = 0;
            
            for( var i = 0 ; i < dataJSON.length ; i++ ){
                let data = dataJSON[i];
                let productDOM = document.createElement('div');
                productDOM.classList = 'cart__product';

                let productNameDOM = document.createElement('p');
                productNameDOM.classList = 'paragraph--5 cart__paragraph cart__product--name';
                productNameDOM.textContent = data.name;

                let productGrid = document.createElement('div');
                productGrid.classList = 'cart__product--grid';

                let productImageBox = document.createElement('div');
                productImageBox.classList = 'cart__product--imagebox';

                let productImage = document.createElement('img');
                productImage.classList = 'cart__product--image cart__product--image--1';
                productImage.src = data.image;

                let productSection = document.createElement('div');
                productSection.classList = 'cart__product--section';

                let productPrice = document.createElement('p');
                productPrice.classList = 'paragraph--6 cart__product--price';
                productPrice.textContent = currency+data.price;

                let productQuantityBox  = document.createElement('div');
                productQuantityBox.classList = 'cart__product--quantity';

                let productQuantityMinus = document.createElement('p');
                productQuantityMinus.classList = 'cart__product--quantity__minus paragraph--3 cart__paragraph';
                productQuantityMinus.textContent = '-';

                let productQuantityAdd = document.createElement('p');
                productQuantityAdd.classList = 'cart__product--quantity__plus paragraph--3 cart__paragraph';
                productQuantityAdd.textContent = '+';

                let productQuantity = document.createElement('p');
                productQuantity.classList = 'cart__product--quantity__number paragraph--6 cart__paragraph';
                productQuantity.textContent = data.quantity;

                productQuantityBox.appendChild(productQuantityMinus);
                productQuantityBox.appendChild(productQuantity);
                productQuantityBox.appendChild(productQuantityAdd);

                productSection.appendChild(productPrice);
                productSection.appendChild(productQuantityBox);

                productImageBox.appendChild(productImage);

                productGrid.appendChild(productImageBox);
                productGrid.appendChild(productSection);

                productDOM.appendChild(productNameDOM);
                productDOM.appendChild(productGrid);

                cartProductsContainerDOM.appendChild(productDOM);
                totalPrice = totalPrice+(parseFloat(data.quantity)*parseFloat(data.price));

            }
            cartTotalPriceDOM.textContent = currency+totalPrice;
            
            cartProductAddButtons = document.getElementsByClassName('cart__product--quantity__plus');
            cartProductMinusButtons = document.getElementsByClassName('cart__product--quantity__minus');
            cartProductQuantityNumber = document.getElementsByClassName('cart__product--quantity__number');

            Array.from(cartProductAddButtons).forEach( (button,index) => {
                button.addEventListener( 'click' , function(){
                    updateQuantity(index,+1);
                } );
            } );

            Array.from(cartProductMinusButtons).forEach( (button,index) => {
                button.addEventListener( 'click' , function(){
                    updateQuantity(index,-1);
                } );
            } );
        }

    }
}
updateCart();   //Calling Update Cart

//-----------------------------------UPDATE QUANTITY---------------------------------

var updateQuantity = function ( i,v ) { 
    let quantity = parseInt(cartProductQuantityNumber[i].textContent);
    quantity = quantity + v;
    cartJSON[i].quantity = quantity;

    const xhr = new XMLHttpRequest();
    xhr.open( 'post' , updateCartURL );
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send(JSON.stringify(cartJSON));
    
    xhr.onload = function(){
        let returnedDATA = xhr.responseText;
        let dataJSON = JSON.parse(returnedDATA);

        if( dataJSON === 0 ){
            alert('Error');
        }else{
            updateCart();
        }

    }

}

//-----------------------------------NAVIGATION---------------------------------------

headerCartButtonDOM.addEventListener('click',function(e){
    e.preventDefault();
    document.querySelector('body').style.overflow = 'hidden';
    cartDOM.style.display = 'block';
});

mobileCartButtonDOM.addEventListener('click',function(){

    if(mobileCartMenu === false){
        document.querySelector('body').style.overflow = 'hidden';
        cartDOM.style.display = 'block';
        mobileCartMenu = true;
    }
});

cartCloseButtonDOM.addEventListener('click',function(){
    document.querySelector('body').style.overflow = 'visible';
    cartDOM.style.display = 'none';
    mobileCartMenu = false;
});