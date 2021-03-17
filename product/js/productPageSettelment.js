var headerProductHomeLinkDOM = document.getElementById('productHomeLink');
var headerProductCategoryLinkDOM = document.getElementById('productCategoryLink');
var headerProductNameDOM = document.getElementById('productNameHeader');

var leftProductNameDOM = document.getElementById('productName');
var leftProductPriceDOM = document.getElementById('productPrice');
var leftProductPriceDelimeterDOM = document.getElementById('productPriceDelimeter');
var leftProductAttributesContainerDOM = document.getElementById('productAttributesContainer');
var leftProductQuantityDOM = document.getElementById('productQuantity');
var leftProductQuantityAddDOM = document.getElementById('productQuantityAdd');
var leftProductQuantitySubDOM = document.getElementById('productQuantitySub');
var leftProductImagesContainerDOM = document.getElementById('productImagesContainer');
var leftProductImages = document.getElementsByClassName('productpage__images--image');

var centerCoverImage = document.querySelector('.productpage__coverImage');

var relatedProductsContainer = document.querySelector('.related__container');

//------------------------------------Setteling Headers --------------------------------------

var settelingHeaders = function(){
    headerProductHomeLinkDOM.href = 'http://localhost/ukstore';
    headerProductCategoryLinkDOM.href = 'http://localhost/ukstore/categories?c='+php_product.categoryID;

    headerProductCategoryLinkDOM.childNodes[0].textContent = categoryName;
    headerProductNameDOM.textContent = productName;
}

//------------------------------------Setteling Left Container--------------------------------------

var settelingLeftContainer = function () { 
    leftProductNameDOM.textContent = productName;
    
    if( prices[0] !== sellingPrices[0] ){
        leftProductPriceDelimeterDOM.textContent = currency + parseFloat(sellingPrices[0]);
        leftProductPriceDOM.innerHTML = currency + parseFloat(prices[0]) + ' ' + leftProductPriceDelimeterDOM.outerHTML;
    }else{
        leftProductPriceDOM.innerHTML = currency + parseFloat(prices[0]);
    }

    selectedPrice = sellingPrices[0];

    if( attributes.length > 0 ){
        
        //----------------------------Attributes Available-----------------------------------------
        attributes.forEach( (attribute,index) => {
            let attributeBOX = document.createElement('div');
            let attributeName = document.createElement('p');
            let attributeSelectBOX = document.createElement('select');

            attributeBOX.classList = 'productpage__attribute';
            attributeName.classList = 'paragraph--5 productpage__paragraph productpage__attribute--title';
            attributeName.textContent = attribute.name;
            attributeSelectBOX.classList = 'productpage__select productpage__attribute--select';

            attribute.attValues.forEach( (val,i) => {
                let option = document.createElement('option');
                option.textContent = val;
                option.value = i;
                
                attributeSelectBOX.appendChild(option);
            } );
            attributeBOX.appendChild(attributeName);
            attributeBOX.appendChild(attributeSelectBOX);

            leftProductAttributesContainerDOM.appendChild(attributeBOX);
            selectedAttributes.push({
                attributeID : attributesID[index],
                attributeValue : 0,
            });
        } );
    }

    //################################Attribute Change Listener########################################
    
    if( leftProductAttributesContainerDOM.childElementCount > 0 ){
        let allSelecters = document.querySelectorAll('#productAttributesContainer .productpage__attribute select');
        Array.from( allSelecters ).forEach( (select,index) => {
            select.addEventListener('change',function(){
                selectedAttributes[index] = {
                    attributeID : attributesID[index],
                    attributeValue : select.value
                };
                attributeIndex = select.value;
                selectedPrice = sellingPrices[select.value];
                if( prices[select.value] !== sellingPrices[select.value] ){
                    leftProductPriceDelimeterDOM.textContent = currency + parseFloat(sellingPrices[select.value]);
                    leftProductPriceDOM.innerHTML = currency + parseFloat(prices[select.value]) + ' ' + leftProductPriceDelimeterDOM.outerHTML;
                }else{
                    leftProductPriceDOM.innerHTML = currency + parseFloat(prices[select.value]);
                }
            });
        } );
    }
    

    //---------------------------------Adding Images-----------------------------------------------

    productImages.forEach( (link,i) => {
        var image = document.createElement('img');
        image.classList = 'productpage__images--image';
        image.src = link;
        leftProductImagesContainerDOM.appendChild(image);

    } );

    //--------------------------------Setting Cover Image-----------------------------------------

    Array.from(leftProductImages).forEach( (image,index) => {
        image.addEventListener('click',function(){
            centerCoverImage.src = productImages[index];
        });
    } );

}

//#################################Quantity Add Listener#########################################

var quantityChange = function(i,func){
    if( func === 'add' ){
        if( stockes[i] >= quantity+1 ){
            quantity++;
        }else{
            alert('No More Stockes Available');
        }
    }else{
        if( quantity > 1 ){
            quantity--;
        }else{
            alert( 'Quantity Must Be Greater Than 1' );
        }
    }
    leftProductQuantityDOM.textContent = quantity;
}

leftProductQuantityAddDOM.addEventListener( 'click',function(){
    quantityChange(attributeIndex,'add');
} );

leftProductQuantitySubDOM.addEventListener( 'click',function(){
    quantityChange(attributeIndex,'sub');
} );

//=======================================MAIN==========================================================

if( php_product.isProduct === undefined ){
    //--------------------------IF NO PRODUCT-----------------------------------
    console.log('No Product');
}else{
    //--------------------------IF PRODUCT-----------------------------------
    //Header Settelment
    settelingHeaders();
    //Left ContainerSettelment
    settelingLeftContainer();
}

//+++++++++++++++++++++++++++++++++++SIMILAR PRODUCTS SHOWCASE++++++++++++++++++++++++++++++++++++++++++++

Array.from( php_similarProducts ).forEach( (product,index) => {
    let productBOX = document.createElement('div');
    let productImageLink = document.createElement('a');
    let productSale = document.createElement('p');
    let image1 = document.createElement('img');
    let image2 = document.createElement('img');
    let productName = document.createElement('p');
    let productPrice = document.createElement('p');
    let productPriceDelimeter = document.createElement('span');
    productBOX.classList = 'product';
    productImageLink.classList = 'product__imagelink';
    productImageLink.href = 'http://localhost/ukstore/product/?p='+product.id;

    if( product.prices[0] !== product.sellingPrices[0] ){
        productSale.classList = 'paragraph--6 product__sale';
        productSale.textContent = 'SALE';
    }

    image1.classList = 'product__imagelink--image product__imagelink--image--1';
    image2.classList = 'product__imagelink--image product__imagelink--image--2';
    image1.src = product.images[0];
    image2.src = product.images[0];

    if( product.images.length > 1 ){
        image2.href = product.images[1];
    }else{
        
    }

    productImageLink.appendChild(productSale);
    productImageLink.appendChild(image1);
    productImageLink.appendChild(image2);

    productName.classList = 'product__paragraph paragraph--5 product__title';
    productName.textContent = product.name;
    productPrice.classList = 'product__price paragraph--6';
    productPriceDelimeter.classList = 'product__price--delete';

    if( product.prices[0] !== product.sellingPrices[0] ){
        productPriceDelimeter.textContent = parseFloat(product.sellingPrices[0]);
        productPrice.innerHTML = currency+parseFloat(product.prices[0])+' '+productPriceDelimeter.outerHTML;
    }else{
        productPrice.innerHTML = currency+parseFloat(product.prices[0]);
    }

    productBOX.appendChild(productImageLink);
    productBOX.appendChild(productName);
    productBOX.appendChild(productPrice);

    relatedProductsContainer.appendChild(productBOX);

} );