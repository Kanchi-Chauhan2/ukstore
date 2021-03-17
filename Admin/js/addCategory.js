
var addCategoryImageHeightCheck = false;
var addCategoryImageWidthCheck = false;
var addCategoryImageCheck = false;
var addCategorySlugCheck = false;
var addCategoryNameCheck = false;

var addCategoryNameTextBox = document.getElementById( 'addCategoryName' );
var addCategorySlugTextBox = document.getElementById('addCategorySlug');
var addCategoryChooseImage = document.getElementById('addCategoryImageChooser');     //File Chooser
var addCategoryButton = document.getElementById( 'addCategoryButton' );             //Add Category Button

var addCategoryName = '';
var addCategoryImage = '';
var addCategorySlug = '';
var addCategoryDescription = '';

//--------------------------------Name Check-----------------------------------------

addCategoryNameTextBox.addEventListener( 'focusout' , function(){
    let categoryName = addCategoryNameTextBox.value;

    if( categoryNameRegex.test( categoryName ) ){
        addCategoryName = categoryName;
        addCategoryNameCheck = true;
    }else{
        addCategoryName = '';
        addCategoryNameCheck = false;
        alert( 'Category Name Syntax Error' );
    }

} );


//--------------------------------IMAGE UPLOAD---------------------------------------
addCategoryChooseImage .addEventListener('change',function(){

    //____________________________FILE CHECK________________________________________

    var fileName = addCategoryChooseImage .files[0].name;
    var ext = '';
    for ( var i = fileName.length ; i >= 0 ; i-- ){
        if( fileName.charAt(i) === '.' ){
            ext = fileName.substr( i, fileName.length );
        }
    }

    if ( ext === '.png' || ext === '.jpg' || ext === '.jpeg' ){
        //_____________________________DIMENSIONS CHECK______________________________________

        var fr = new FileReader();
        fr.readAsDataURL(addCategoryChooseImage.files[0]);
        fr.onload = function(){
            var img = new Image();
            img.src = fr.result;
            img.onload = function(){
                //console.log(img.naturalHeight + ' ' + img.naturalWidth );
                if( img.naturalHeight == 300 ){
                    addCategoryImageHeightCheck = true;
                }else{
                    addCategoryImage = '';
                    addCategoryImageCheck = false;
                    addCategoryImageHeightCheck = false;
                    addCategoryImageCheck = false;
                }

                if( img.naturalWidth == 1080 ){
                    addCategoryImageWidthCheck = true;
                }else{
                    addCategoryImage = '';
                    addCategoryImageCheck = false;
                    addCategoryImageWidthCheck = false;
                    addCategoryImageCheck = false;
                }

                if( addCategoryImageHeightCheck === true && addCategoryImageWidthCheck === true ){
                    const xhr = new XMLHttpRequest();
                    const formData = new FormData();

                    for( const file of addCategoryChooseImage.files ){
                        formData.append('myFiles[]',file);
                    }
                    xhr.open('post',uploadImagesUrl);
                    xhr.send(formData);
                    xhr.onload = function () {
                        if (xhr.status === 200){
                            const data = xhr.responseText;
                            const dataJson = JSON.parse(data);

                            if( dataJson[0] !== 'Error' ){
                                let clientImage = document.getElementById('addCategoryImageDisplay');
                                clientImage.style.display = 'block';
                                clientImage.src = dataJson[0];
                                addCategoryImage = dataJson[0];
                                addCategoryImageCheck = true;
                                addCategoryImageHeightCheck = true;
                                addCategoryImageWidthCheck = true;
                            }else{
                                addCategoryImage = '';
                                addCategoryImageCheck = false;
                                addCategoryImageHeightCheck = false;
                                addCategoryImageWidthCheck = false;
                                alert( 'Image Upload Error' );
                            }

                        }
                    }
                }else{
                    addCategoryImageCheck = false;
                    addCategoryImageHeightCheck = false;
                    addCategoryImageWidthCheck = false;
                    alert( 'Dimensions not matched' );
                }

            }

        }
    }else{
        addCategoryImageCheck = false;
        addCategoryImageHeightCheck = false;
        addCategoryImageWidthCheck = false;
        alert('Not Image File');
    }

});

//--------------------------------addCategorySlugCheck------------------------------------------

addCategorySlugTextBox.addEventListener( 'focusout', function () {

    let slugText = addCategorySlugTextBox.value;

    if( currentSlug === '' ){

    }else{
        slugText = currentSlug+'/'+slugText;
    }

    if(categorySlugRegex.test(slugText) == false || slugText.length > 25 || slugText.length < 3 ){
        addCategorySlugCheck = false;
        addCategorySlug = '';
        alert( 'Syntax Error' );
    }else{
        let xhr = new XMLHttpRequest();
        xhr.open( 'post', checkSlugUrl );
        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xhr.send( 'slugCheck='+slugText+'&parentCategory='+currentParentCategory );

        xhr.onload = function () {
            let returnData = JSON.parse(xhr.responseText);
            if ( returnData == 'accepted' ){
                addCategorySlugCheck = true;
                addCategorySlug = slugText;

            }else{
                addCategorySlug = '';
                addCategorySlugCheck = false;
                alert( 'Slug Already Exists' );
            }

        }
    }

} );

//--------------------------------SUBMIT DATA----------------------------------------

addCategoryButton.addEventListener( 'click' , function (e) {
    e.preventDefault();
    if ( addCategoryNameCheck === false ){
        alert( 'Make Acceptable Category Name First' );
    }
    if ( addCategorySlugCheck === false ){
        alert( 'Make Acceptable Slug First' );
    }
    if ( addCategoryImageCheck === false ){
        alert( 'Insert Acceptable Image First' );
    }

    if ( addCategoryNameCheck === true && addCategorySlugCheck === true && addCategoryImageCheck === true ){
        addCategoryDescription = document.getElementById( 'addCategoryDescription' ).value;
        const xhr = new XMLHttpRequest();
        const dataUrl = `name=${addCategoryName}&description=${addCategoryDescription}&slug=${addCategorySlug}&image=${addCategoryImage}&parentCategory=${currentParentCategory}`;
        xhr.open('POST',addCategoryUrl);
        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xhr.send(dataUrl);

        xhr.onload = function(){
            let data = xhr.responseText;
            let  dataJson = JSON.parse(data);
            console.log(dataJson);
            if( dataJson[0] === 'Success' ){
                document.getElementById('addCategoryForm').reset();
                document.getElementById('addCategoryImageDisplay').style.display = 'none';

                addCategoryImageHeightCheck = false;
                addCategoryImageWidthCheck = false;
                addCategoryImageCheck = false;
                addCategorySlugCheck = false;
                addCategoryNameCheck = false;

                addCategoryName = '';
                addCategoryImage = '';
                addCategorySlug = '';
                addCategoryDescription = '';

                var currentlyAddedCategory = dataJson[1];

                if( currentParentCategory != 0 ){

                    let dataSendUrl = `super=${currentParentCategory}&sub=${currentlyAddedCategory}`;

                    const xhr = new XMLHttpRequest();
                    xhr.open('post',addSubcategoryUrl);
                    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                    xhr.send(dataSendUrl);

                    xhr.onload = function () {
                        let data = xhr.responseText;
                        let dataJson = JSON.parse(data);

                        if ( dataJson[0] === 'Success' ){
                            alert('Category Added');
                        }else if ( dataJson[0] === 'Failed' ){4
                            alert('Category Added Failed');
                        }else{
                            alert('Connectivity Error');
                        }

                    }

                }else{
                    alert('Category Added');
                }
                
            }else if( dataJson[0] === 'Failed' ){
                alert('Failed to Add Category');
            }else{
                alert('Connectivity Error');
            }

        }

    }

} );
