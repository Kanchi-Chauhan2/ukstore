var addAttributeValueButtonDOM = document.querySelector('.attributes__addValue');
var addAttributeSaveButtonDOM = document.querySelector('.attributes__saveAttribute');
var attributeFormDOM = document.querySelector('.attributes__form');
var attributeValuesDOM = document.getElementsByClassName('attributes__value');
var addAttributeNameDOM = document.getElementById('addAttributeName');
var addAttributeDisplayNameDOM = document.getElementById('addAttributeDisplay');

var attributeName = '';
var attributeDisplayName = '';
var attributeValues = '';

addAttributeValueButtonDOM.addEventListener( 'click' , function(e){
    e.preventDefault();
    var textBox = document.createElement('input');
    textBox.type = 'text';
    textBox.placeholder = 'Attribute Value';
    textBox.classList = 'attributes__value attributes__textbox';
    attributeFormDOM.insertBefore( textBox, attributeFormDOM.children[attributeFormDOM.children.length - 2] );
} );

addAttributeSaveButtonDOM.addEventListener( 'click', function(e){
    e.preventDefault();
    var temp = '';
    Array.from( attributeValuesDOM ).forEach( (textbox,index) => {
        if( index === attributeValuesDOM.length - 1 ){
            temp = temp + textbox.value;
        }else{
            temp = temp + textbox.value + ',';
        }
    } );
    attributeValues = temp;
    attributeName = addAttributeNameDOM.value;
    attributeDisplayName = addAttributeDisplayNameDOM.value;

    const xhr = new XMLHttpRequest();
    xhr.open( 'post', addAttributeURL );
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');

    let dataURL = `name=${attributeName}&displayName=${attributeDisplayName}&attributes=${attributeValues}`;
    xhr.send(dataURL);

    xhr.onload = function(){
        let returnedText = xhr.responseText;
        let dataJSON = JSON.parse(returnedText);

        if( dataJSON[0] == 'Success' ){
            attributeName = '';
            attributeDisplayName = '';
            attributeValues = '';
            attributeFormDOM.reset();
            
            alert( 'Attribute Inserted' );

        }

    }

} );    