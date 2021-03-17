

if( newProducts.length > 0 ){
    //---------------------------Creating New Products----------------------------------

    Array.from( newProducts ).forEach( (product,index) => {
        let productDOM = document.createElement('div');
        let productImageLink = document.createElement('a');
        let productSaleDOM = document.createElement('p');
        let image1 = document.createElement('img');
        let image2 = document.createElement('img');
        let productTitle = document.createElement('a');
        let productPrice = document.createElement('p');
        let productPriceDelimeter = document.createElement('span');

        productDOM.classList = 'product';
        productImageLink.classList = 'product__imagelink';
        productImageLink.href = domainPrefix+'product/?p='+product.id;

        if( product.prices[0] !== product.sellingPrices[0] ){
            productSaleDOM.classList = 'paragraph--6 product__sale';
            productSaleDOM.textContent = 'SALE';
        }

        image1.classList = 'product__imagelink--image product__imagelink--image--1';
        image2.classList = 'product__imagelink--image product__imagelink--image--2';

        image1.src = product.images[0];
        image2.src = product.images[0];

        if( product.images.length > 1 ){
            image2.src = product.images[1];
        }

        productTitle.classList = 'product__paragraph paragraph--5 product__title';
        productTitle.href = domainPrefix+'product/?p='+product.id;
        productTitle.textContent = product.name;

        productPrice.classList = 'product__price paragraph--6';
        productPriceDelimeter.classList = 'product__price--delete'; 

        if( product.prices[0] !== product.sellingPrices[0] ){
            productPriceDelimeter.textContent = currency+parseFloat(product.sellingPrices[0]);
            productPrice.innerHTML = currency+parseFloat(product.prices[0])+' '+productPriceDelimeter.outerHTML;
        }else{
            productPrice.textContent = currency+parseFloat(product.prices[0]);
        }

        productImageLink.appendChild(productSaleDOM);
        productImageLink.appendChild(image1);
        productImageLink.appendChild(image2);

        productDOM.appendChild(productImageLink);
        productDOM.appendChild(productTitle);
        productDOM.appendChild(productPrice);

        newContainer.appendChild(productDOM);

    } );
    
    //---------------------------Creating Blockbuster Products----------------------------------

    Array.from( blockbusterProducts ).forEach( (product,index) => {
        let productDOM = document.createElement('div');
        let productImageLink = document.createElement('a');
        let productSaleDOM = document.createElement('p');
        let image1 = document.createElement('img');
        let image2 = document.createElement('img');
        let productTitle = document.createElement('a');
        let productPrice = document.createElement('p');
        let productPriceDelimeter = document.createElement('span');

        productDOM.classList = 'product';
        productImageLink.classList = 'product__imagelink';
        productImageLink.href = domainPrefix+'product/?p='+product.id;

        if( product.prices[0] !== product.sellingPrices[0] ){
            productSaleDOM.classList = 'paragraph--6 product__sale';
            productSaleDOM.textContent = 'SALE';
        }

        image1.classList = 'product__imagelink--image product__imagelink--image--1';
        image2.classList = 'product__imagelink--image product__imagelink--image--2';

        image1.src = product.images[0];
        image2.src = product.images[0];

        if( product.images.length > 1 ){
            image2.src = product.images[1];
        }

        productTitle.classList = 'product__paragraph paragraph--5 product__title';
        productTitle.href = domainPrefix+'product/?p='+product.id;
        productTitle.textContent = product.name;

        productPrice.classList = 'product__price paragraph--6';
        productPriceDelimeter.classList = 'product__price--delete'; 

        if( product.prices[0] !== product.sellingPrices[0] ){
            productPriceDelimeter.textContent = currency+parseFloat(product.sellingPrices[0]);
            productPrice.innerHTML = currency+parseFloat(product.prices[0])+' '+productPriceDelimeter.outerHTML;
        }else{
            productPrice.textContent = currency+parseFloat(product.prices[0]);
        }

        productImageLink.appendChild(productSaleDOM);
        productImageLink.appendChild(image1);
        productImageLink.appendChild(image2);

        productDOM.appendChild(productImageLink);
        productDOM.appendChild(productTitle);
        productDOM.appendChild(productPrice);

        blockbusterContainer.appendChild(productDOM);

    } );

}