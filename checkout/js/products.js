var subTotal = 0;
var grandTotal = 0;
var productsDOM = document.querySelector('.order__products');
let subTotalSpanDOM = document.getElementById('subtotal');
let grandTotalDOM = document.getElementById('total');

if( products !== undefined ){
    Array.from(products).forEach( (product,index) => {
        let productDOM = document.createElement('div');
        productDOM.classList = 'order__product';

        let imageBOX = document.createElement('div');
        imageBOX.classList = 'order__imagebox';

        let image = document.createElement('img');
        image.classList = 'order__image';
        image.src = product.image;

        let quantity = document.createElement('p');
        quantity.classList = 'paragraph--6 order__quantity order__paragraph';
        quantity.textContent = product.quantity;

        let productDetailBOX = document.createElement('div');
        productDetailBOX.classList = 'order__productDetails';

        let productDetailLeft = document.createElement('div');
        productDetailLeft.classList = 'order__productDetails--left';

        let productName = document.createElement('p');
        productName.classList = 'paragraph--6 order__paragraph order__product--name';
        productName.textContent = product.name;

        let productDetail = document.createElement('p');
        if( product.type === 'variable' ){
            productDetail.classList = 'paragraph--6 order__details';
            productDetail.textContent = product.attributeName+' / '+product.attributeValue;
        }

        let productDetailRight = document.createElement('div');
        productDetailRight.classList = 'order__productDetails--right';

        let price = document.createElement('p');
        price.classList = 'paragraph--6 order__product--price order__paragraph';
        price.textContent = currency+(parseFloat(product.price)*parseInt(product.quantity));
        subTotal = subTotal + (parseFloat(product.price)*parseInt(product.quantity));

        productDetailRight.appendChild(price);

        productDetailLeft.appendChild(productName);
        productDetailLeft.appendChild(productDetail);

        productDetailBOX.appendChild(productDetailLeft);
        productDetailBOX.appendChild(productDetailRight);

        imageBOX.appendChild(image);
        imageBOX.appendChild(quantity);

        productDOM.appendChild(imageBOX);
        productDOM.appendChild(productDetailBOX);

        productsDOM.appendChild(productDOM);

    } );
    subTotalSpanDOM.textContent = currency+subTotal;
    grandTotalDOM.textContent = currency+subTotal;
}