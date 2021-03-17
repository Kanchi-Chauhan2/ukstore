//-------------------------------------     DOMS    -----------------------------------------------

var addProductFormDOM = document.querySelector('.addProduct__form');
var addProductTextNameDOM = document.getElementById('addProductName');
var addProductSelectCategoryDOM = document.getElementById('addProductSelectCategory');
var addProductDetailsDOM = document.getElementById('addProductDetails');
var addProductSelectImagesDOM = document.getElementById('addProductSelectImages');
var addProductImagesBoxDOM = document.querySelector('.addProduct__images');
var addProductAttributesSelectDOM = document.querySelector('.addProduct__attributesSelect');
var addProductAttributesAddButtonDOM = document.getElementById('addProductAddAttribute');
var addProductAttributeTableDOM = document.querySelector('.addProduct__attributeTable');
var variable__addProductStockBoxDOM = document.getElementsByClassName('addProduct__stockBox');
var variable__addProductPriceBoxDOM = document.getElementsByClassName('addProduct__priceBox');
var variable__addProductSellingPriceBoxDOM = document.getElementsByClassName('addProduct__sellingPriceBox');
var variable__addProductActivesDOM = document.getElementsByClassName('addProduct__actives');
var addProductNoAttributeBox = document.querySelector('.addProduct__noAttributeBox');
var addProductStockDOM = document.getElementById('addProductStock');
var addProductPriceDOM = document.getElementById('addProductPrice');
var addProductSalesPriceDOM = document.getElementById('addProductSalesPrice');
var addProductActiveDOM = document.getElementById('addProductActive');
var addProductSelectTaxDOM = document.getElementById('addProductSelectTax');
var addProductButtonDOM = document.getElementById('addProductButton');


//---------------------------------------   VARIABLES   -----------------------------------------------

var addProductIsVariable = false;

var addProductAllAttributes = '';
var addProductAllCategories = '';
var addProductAllTaxes = '';

var addProductImagesArray = new Array();
var addProductSelectedAttributes = '';
var addProductAttributesTableTR = new Array();
var addProductTempAttributes = new Array();

var variable__addProductPrices = '';
var variable__addProductSalesPrices = '';
var variable__addProductStockes = '';
var variable__addProductActives = '';

var addProductDataURL = '';


//---------------------------------------   PREREQUISITS    --------------------------------------------

var addProductPreRequisits = function(){   
    const xhr = new XMLHttpRequest();

    //--------------------------------GET ALL ATTRIBUTES---------------------------------------

    xhr.open('post',getAllAttributesURL);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send('');
    xhr.onload = function(){
        let returnedData = xhr.responseText;
        let dataJSON = JSON.parse(returnedData);
        addProductAllAttributes = dataJSON;

        Array.from( addProductAllAttributes ).forEach( (attribute,index) => {
            let optionDOM = document.createElement('option');
            optionDOM.value = index;
            optionDOM.textContent = attribute.name;

            addProductAttributesSelectDOM.appendChild(optionDOM);

        } );

    }

    //--------------------------------GET ALL CATEGORIES---------------------------------------

    const xhrCat = new XMLHttpRequest();
    xhrCat.open('post',getAllCategoriesURL);
    xhrCat.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhrCat.send('');

    xhrCat.onload = function () { 
        let returnedData = xhrCat.responseText;
        let dataJSON = JSON.parse(returnedData);
        addProductAllCategories = dataJSON;

        Array.from(addProductAllCategories).forEach( (category,index) => {
            let optionDOM = document.createElement('option');
            optionDOM.value = index;
            optionDOM.textContent = category.slug;
            addProductSelectCategoryDOM.appendChild(optionDOM);
        } );

    }

    //--------------------------------GET ALL TAXES---------------------------------------

    const xhrTax = new XMLHttpRequest();
    xhrTax.open('post',getAllTaxesURL);
    xhrTax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhrTax.send('');

    xhrTax.onload = function(){
        let returnedData = xhrTax.responseText;
        
        let dataJSON = JSON.parse(returnedData);
        addProductAllTaxes = dataJSON;

        Array.from(addProductAllTaxes).forEach( (tax,index) => {
            let optionDOM = document.createElement('option');
            optionDOM.value = index;
            optionDOM.textContent = tax.name;
            addProductSelectTaxDOM.appendChild(optionDOM);
        } );

    }

}

addProductPreRequisits();

//---------------------------------------   Image UPLOAD    --------------------------------------------

addProductSelectImagesDOM.addEventListener( 'change', function () { 
    const files = addProductSelectImagesDOM.files;
    
    const formData = new FormData();

    for( const file of files ){
        formData.append('myFiles[]',file);
    }

    const xhr = new XMLHttpRequest();
    xhr.open('post',uploadImagesUrl);
    xhr.send(formData);
    

    xhr.onload = function () { 
        const returnedData = xhr.responseText;
        const dataJSON = JSON.parse(returnedData);
        
        Array.from(dataJSON).forEach( (path,index) => {
            const imageDOM = document.createElement('img');
            imageDOM.classList.add('addProduct__image');
            imageDOM.src = path;
            addProductImagesBoxDOM.appendChild(imageDOM);
            addProductImagesArray.push(path);

        } );
    }

} );

//---------------------------------------   Attributes Table    --------------------------------------------

function selectArrayTR( index, arr ){
    let returnArray = new Array();
    if( index == 0 ){
        Array.from( arr[index].values ).forEach( val => {
            let tr = document.createElement('tr');
            let td = document.createElement('td');
            td.textContent = val;
            tr.appendChild(td);
            returnArray.push(tr);
        } );
    }else{
        let returnedArray = selectArrayTR( index - 1, addProductTempAttributes );
        let newArray = new Array();
        Array.from( addProductTempAttributes[index].values ).forEach( val => {
            
            let td = document.createElement('td');
            td.textContent = val;
            Array.from( returnedArray ).forEach( tr => {
                let cloneTD = td.cloneNode(true);                
                let cloneTR = tr.cloneNode(true);
                cloneTR.appendChild(cloneTD);
                newArray.push(cloneTR);
            } );
        } );
        returnArray = newArray;
    }
    return returnArray;
}

addProductAttributesAddButtonDOM.addEventListener( 'click', function(e){
    e.preventDefault();
    addProductIsVariable = true;
    addProductNoAttributeBox.style.display = 'none';
    addProductAttributeTableDOM.style.display = 'table';

    if( addProductAttributesSelectDOM.selectedOptions[0].disabled === false ){
        if( addProductSelectedAttributes.length === 0 ){
            addProductSelectedAttributes = addProductAttributesSelectDOM.value;
        }else{
            addProductSelectedAttributes = addProductSelectedAttributes+','+addProductAttributesSelectDOM.value;
        }
    
        addProductTempAttributes.push(addProductAllAttributes[addProductAttributesSelectDOM.value]);
        
        let th = document.createElement('th');
        
        th.textContent = addProductAllAttributes[addProductAttributesSelectDOM.value].name;
        let tr = addProductAttributeTableDOM.querySelector('thead tr');
        tr.insertBefore(th,document.querySelector('.addProduct__attributeTable thead th:nth-last-child(4)'));
    
        Array.from( addProductAttributesSelectDOM.querySelectorAll('option') ).forEach( (option) => {
            if( addProductAttributesSelectDOM.value == option.value ){
                option.disabled = true;
            }
        } );
    
        addProductAttributesTableTR = new Array();
    
        // let tbodyDOM = addProductAttributeTableDOM.querySelector('tbody');
        Array.from(addProductAttributeTableDOM.querySelectorAll('tbody tr')).forEach( (tr,index) =>{
            tr.remove();
        } );
    
        addProductAttributesTableTR = selectArrayTR(addProductTempAttributes.length - 1, addProductTempAttributes );
    
        Array.from( addProductAttributesTableTR ).forEach( (tr,i) => {
    
            for( let i = 0 ; i < 4 ; i++ ){
                let td = document.createElement('td');
                let input = document.createElement('input');
    
                if( i <= 2 ){
                    input.type = 'number';
                    
                    if( i === 0 ){

                    }else{
                        input.step = "0.0000001";
                    }

                    input.classList.add('addProduct__text');
    
                    switch(i){
                        case 0:
                            input.classList.add('addProduct__stockBox');
                            break;
                        case 1:
                            input.classList.add('addProduct__priceBox');
                            break;
                        case 2:
                            input.classList.add('addProduct__sellingPriceBox');
                            break;
                    }
    
                }else{
                    input.type = 'checkbox';
                    input.classList = 'addProduct__radio addProduct__actives';
                }
    
                td.appendChild(input);
                tr.appendChild(td);
    
            }
            
            addProductAttributeTableDOM.querySelector('tbody').appendChild(tr);
        } )
    }else{
        alert( 'Change Selected Attribute Value' );
    }
    
} );

//---------------------------------------   Add Product    --------------------------------------------

addProductButtonDOM.addEventListener( 'click' , function(e){
    e.preventDefault();
    var checking = addProductLastCheck();
    
    if( checking === true ){
        
        const xhr = new XMLHttpRequest();
        xhr.open('post',addProductURL);
        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xhr.send( addProductDataURL );

        xhr.onload = function(){
            let responseText = xhr.responseText;
            let dataJSON = JSON.parse(responseText);
            if( dataJSON[0] === 'Successful' ){
                addProductIsVariable = false;
                
                addProductAllAttributes = '';
                addProductAllCategories = '';
                addProductAllTaxes = '';
                
                addProductImagesArray = new Array();
                addProductSelectedAttributes = '';
                addProductAttributesTableTR = new Array();
                addProductTempAttributes = new Array();
                
                variable__addProductPrices = '';
                variable__addProductSalesPrices = '';
                variable__addProductStockes = '';
                variable__addProductActives = '';
                
                addProductDataURL = '';
                addProductFormDOM.reset();

                alert( 'Data Succesfully Added' );
            }else{
                alert( 'Error in Connection' );
            }
        };

        
    }else{
        
    }
    

} );

var addProductLastCheck = function(){
    //----------------------------------TEMP VARIABLES-------------------------------------
    let name = '';
    let category = '';
    let details = '';
    let images = '';
    let attributes = '';
    let stockes = '';
    let prices = '';
    let sellingPrices = '';
    let actives = '';
    let tax = ''

    //----------------------------------CHECK VARIABLES-------------------------------------

    let checkName = false;
    let checkCategory = false;
    let checkDetails = false;
    let checkImages = false;
    let checkAttributes = false;
    let checkStockes = false;
    let checkPrices = false;
    let checkSellingPrices = false;
    let checkActives = false;
    let checkTax = false;

    //-------------------------------   Product Name Check  --------------------------------

    if( addProductTextNameDOM.value.trim().length > 2 ){
        name = addProductTextNameDOM.value;
        checkName = true;
    }else{
        checkName = false;
        name = '';
        alert( 'Name is Unacceptable.The length should be greater than 2' );
        return false;
    }

    //-------------------------------   Product Category Check  --------------------------------

    category = addProductAllCategories[addProductSelectCategoryDOM.value].id;
    checkCategory = true;

    //-------------------------------   Product Details Check  --------------------------------

    if( addProductDetailsDOM.value.length > 99 ){
        details = addProductDetailsDOM.value;
        let tempStr = "";

        for( let i = 0 ; i < details.length ; i++ ){
            if( details.charCodeAt(i) === 39 ){
                tempStr = tempStr+String.fromCharCode(92)+"'";
            }else{
                tempStr = tempStr + details.charAt(i);
            }
        }
        
        addProductDetailsDOM.value = tempStr;
        details = tempStr;
        checkDetails = true;
    }else{
        checkDetails = false;
        details = '';
        alert( 'Description Length must be greater than 100' );
        return false;
    }

    //-------------------------------   Product Images Check  --------------------------------

    if( addProductImagesArray.length != 0  ){
        
        Array.from(addProductImagesArray).forEach( (image,index) => {
            if( index === 0 ){
                images = image;
            }else{
                images = images + ',' + image;
            }
        } );

        checkImages = true;
    }else{
        checkImages = false;
        images = '';
        alert( 'Insert At Least One Image' );
        return false;
    }

    //-------------------------------   Product Attributes Check  --------------------------------

    if( addProductIsVariable === false ){
        checkAttributes = true;
        attributes = '-1';
    }else{
        checkAttributes = true;
        Array.from(addProductTempAttributes).forEach( (attribute,index) => {
            if( index === 0 ){
                attributes = attribute.id;
            }else{
                attributes = attributes + ',' + attribute.id;
            }
        } );
    }

    //-------------------------------   Product Variable Check  --------------------------------

    if( addProductIsVariable === true ){

        //-------------------------------  Variable Product Stockes Check  --------------------------------

        Array.from( variable__addProductStockBoxDOM ).some( (stock,index) => {
            
            if( stock.value == '' ){
                checkStockes = false;
                stockes = '';
                alert( 'Stock Box at '+index+' is Blank' );
                return false;
            }else if( stock.value < 0 ){
                checkStockes = false;
                stockes = '';
                alert( 'Stock Box at '+index+' is Less than 0' );
                return false;
            }else{
                if( index === 0 ){
                    stockes = stock.value;
                    checkStockes = true;
                }else{
                    stockes = stockes + ',' + stock.value;
                    checkStockes = true;
                }
            }
        } );

        //-------------------------------  Variable Product Price Check  --------------------------------

        Array.from( variable__addProductPriceBoxDOM ).some( (price,index) => {
            if( price.value == '' ){
                checkPrices = false;
                prices = '';
                alert( 'Price box at '+index+' is Blank' );
                return false;
            }else if( price.value < 0 ){
                checkPrices = false;
                price = '';
                alert( 'Price box at '+index+' id less than 0' );
                return false;
            }else{
                if( index === 0 ){
                    prices = price.value;
                    checkPrices = true;
                }else{
                    prices = prices + ',' + price.value;
                    checkPrices = true;
                }
            }
        } );

        //-------------------------------  Variable Product Selling Price Check  --------------------------------

        Array.from( variable__addProductSellingPriceBoxDOM ).some( (sellingPrice,index) => {
            
            if( sellingPrice.value == '' ){
                checkSellingPrices = false;
                sellingPrices = '';
                alert( 'Check Selling Price Box at '+index+' is Empty' );
                return false;
            }else if( sellingPrice.value < 0 ){
                checkSellingPrices = false;
                sellingPrices = '';
                alert( 'Check Selling Price Box at '+index+' is less than 0' );
                return false;
            }else{
                if( index === 0 ){
                    sellingPrices = '';
                    sellingPrices = sellingPrice.value;
                    checkSellingPrices = true;
                }else{
                    sellingPrices = sellingPrices + ',' +sellingPrice.value;
                    checkSellingPrices = true;
                }
            }
        } );

        //-------------------------------  Variable Product Active Check  --------------------------------

        Array.from( variable__addProductActivesDOM ).some( ( active, index ) => {
            if( index === 0 ){
                actives = active.checked+'';
            }else{
                actives = actives+','+active.checked;
            }
            checkActives = true;
        } );

    }else{
        //-------------------------------Product Stock Check -----------------------------------

        if( addProductStockDOM.value < 0 || addProductStockDOM.value == '' ){
            checkStockes = false;
            stockes = '';
            alert( 'Stocks Value is Unacceptable' );
            return false;
        }else{
            checkStockes = true;
            stockes = addProductStockDOM.value;
        }

        //-------------------------------Product Price Check -----------------------------------

        if( addProductPriceDOM.value < 0 || addProductPriceDOM.value == '' ){
            checkPrices = false;
            prices = '';
            alert( 'Unacceptable Price Entered' );
            return false;
        }else{
            checkPrices = true;
            prices = addProductPriceDOM.value;
        }

        //-------------------------------Product Sales Price Check -----------------------------------

        if( addProductSalesPriceDOM.value < 0 || addProductSalesPriceDOM.value == '' ){
            checkSellingPrices = false;
            sellingPrices = '';
            alert( 'Unacceptable Selling Price' );
            return false;
        }else{
            sellingPrices = addProductSalesPriceDOM.value;
            checkSellingPrices = true;
        }

        //-------------------------------Product Active Check -----------------------------------

        actives = addProductActiveDOM.checked+'';
        checkActives = true;

    }

    //-------------------------------   Product Tax Check  --------------------------------

    tax = addProductAllTaxes[addProductSelectTaxDOM.value].id;
    checkTax = true;

    if( checkName === false ){
        alert( 'Entered Name is Wrong' );
        return false;
    }
    if( checkCategory === false ){
        alert( 'Selected Category is Wrong' );
        return false;
    }
    if( checkDetails === false ){
        alert( 'Entered Description is Short' );
        return false;
    }
    if( checkImages === false ){
        alert( 'Entered Images are Unacceptable' );
        return false;
    }
    if( checkAttributes === false ){
        alert( 'Selected Attributes are Invalid' );
        return false;
    }
    if( checkStockes === false ){
        alert( 'Entered Stockes are Invalid' );
        return false;
    }
    if( checkPrices === false ){
        alert( 'Entered Prices are Invalid' );
        return false;
    }
    if( checkSellingPrices == false ){
        alert( 'Entered Selling Prices are Invalid' );
        return false;
    }
    if( checkActives === false ){
        alert( 'Checked Actives are Invalid' );
        return false;
    }
    if( checkTax === false ){
        alert( 'Selected Taxes are Invalid' );
        return false;
    }

    if( checkName === true && checkCategory === true && checkDetails === true && checkImages === true &&
        checkAttributes === true && checkStockes === true && checkPrices === true && checkSellingPrices === true &&
        checkActives === true && checkTax === true ){

            let dataURL = `name=${name}&category=${category}&detail=${details}&images=${images}&attributes=${attributes}&stock=${stockes}&prices=${prices}&sellingPrices=${sellingPrices}&actives=${actives}&taxID=${tax}`;
            addProductDataURL = dataURL;
            return true;

    }
}

