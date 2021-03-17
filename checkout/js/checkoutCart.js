var checkoutCartDOM = document.querySelector('.checkout__cart');
var checkoutSubtotalPriceDOM = document.querySelector('.checkout__subTotal span');

var updateCheckoutCart = function(){

    let allProducts = document.getElementsByClassName('checkout__product');
    let subTotalPrice = 0;

    Array.from(allProducts).forEach( (p) => {
        p.parentElement.removeChild(p);
    } );

    cartJSON.forEach(product => {
        let productDOM = document.createElement('div');
        productDOM.classList = 'checkout__product';

        let productClosebutton = document.createElement('div');
        productClosebutton.classList = 'checkout__productClose';
        productClosebutton.textContent = 'x';

        let productImageBox = document.createElement('div');
        productImageBox.classList = 'checkout__imagebox';

        let productImage = document.createElement('img');
        productImage.classList = 'checkout__image';
        productImage.src = product.image;

        let productDeatilsDOM = document.createElement('div');
        productDeatilsDOM.classList = 'checkout__productDetails';

        let productName = document.createElement('a');
        productName.classList = 'paragraph--6 checkout__productName';
        productName.href = domainPrefix+'product/?p='+product.id;
        productName.textContent = product.name;

        let productAttributes = document.createElement('p');

        if( product.type === 'single' ){

        }else{
            productAttributes.classList = 'paragraph--6 checkout__productAttributes';
            productAttributes.textContent = product.attributeName+' / '+product.attributeValue;
        }

        let productPrice = document.createElement('p');
        productPrice.classList = 'paragraph--6 checkout__productPrice';
        productPrice.textContent = currency+product.price;

        let productQuantityBox = document.createElement('div');
        productQuantityBox.classList = 'checkout__productQuantity';

        let productQuantityMinus = document.createElement('p');
        productQuantityMinus.classList = 'paragraph--6 checkout__productQuantity--minus';
        productQuantityMinus.textContent = '-';

        let productQuantityNumber = document.createElement('p');
        productQuantityNumber.classList = 'paragraph--6 checkout__productQuantity--number';
        productQuantityNumber.textContent = product.quantity;

        let productQuantityAdd = document.createElement('p');
        productQuantityAdd.classList = 'paragraph--6 checkout__productQuantity--add';
        productQuantityAdd.textContent = '+';

        let productTotalPrice = document.createElement('p');
        productTotalPrice.classList = 'paragraph--6 checkout__productTotalPrice';
        productTotalPrice.textContent = currency+(product.quantity*product.price);
        subTotalPrice = subTotalPrice + (product.quantity*product.price);

        productQuantityBox.appendChild(productQuantityMinus);
        productQuantityBox.appendChild(productQuantityNumber);
        productQuantityBox.appendChild(productQuantityAdd);

        productDeatilsDOM.appendChild(productName);
        productDeatilsDOM.appendChild(productAttributes);
        productDeatilsDOM.appendChild(productPrice);
        productDeatilsDOM.appendChild(productQuantityBox);
        productDeatilsDOM.appendChild(productTotalPrice);

        productImageBox.appendChild(productImage);

        productDOM.appendChild(productClosebutton);
        productDOM.appendChild(productImageBox);
        productDOM.appendChild(productDeatilsDOM);

        checkoutCartDOM.appendChild(productDOM);

    });

    checkoutSubtotalPriceDOM.textContent = currency + subTotalPrice;

    let cartProductMinusButtons = document.getElementsByClassName('checkout__productQuantity--minus');
    let cartProductAddButtons = document.getElementsByClassName('checkout__productQuantity--add');
    let cartProductQuantityNumbers = document.getElementsByClassName('checkout__productQuantity--number');

    let cartProductCloseButtons = document.getElementsByClassName('checkout__productClose');

    Array.from(cartProductMinusButtons).forEach( (button,index) => {
        button.addEventListener(  'click' , ()=> {
            updateQuantity(index,-1);
        });
    } );

    Array.from(cartProductAddButtons).forEach( (button,index) => {
        button.addEventListener(  'click' , ()=> {
            updateQuantity(index,+1);
        });
    } );

    Array.from(cartProductCloseButtons).forEach( (button,index) => {
        button.addEventListener( 'click' , ()=>{
            updateQuantity(index,parseInt(cartProductQuantityNumbers[index].textContent)*-1);
        } );
    } );

}