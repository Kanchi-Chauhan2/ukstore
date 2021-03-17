var editCategoryImageHeightCheck = true;
var editCategoryImageWidthCheck = true;
var editCategoryImageCheck = true;
var editCategorySlugCheck = true;
var editCategoryNameCheck = true;

var editCategoryNameTextBox = document.getElementById( 'editCategoryName' );
var editCategorySlugTextBox = document.getElementById('editCategorySlug');
var editCategoryDescriptionTextArea = document.getElementById('editCategoryDescription');
var editCategoryImageDOM = document.getElementById('editCategoryImageDisplay');
var editCategoryChooseImage = document.getElementById('editCategoryImageChooser');     //File Chooser
var editCategoryButton = document.getElementById( 'editCategoryButton' );             //Edit Category Button

var editCategoryName = '';
var editCategoryImage = '';
var editCategorySlug = '';
var editCategoryDescription = '';
var editCategoryID = 0;


//----------------------------------FUNCTION SET IMAGE USING STRING----------------------

var setImageDom = function(path){
    editCategoryImageDOM.style.display = 'block';
    editCategoryImageDOM.src = path;

}

//-----------------------------------GET CATEGORY DATA  ---------------------------------

var editCategoryGetData = function(categoryID){
    editCategoryID = categoryID;
    let xhr = new XMLHttpRequest();
    xhr.open( 'post', getCategoryUrl );
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send(`categoryID=${categoryID}`);

    xhr.onload = function(){
        let responseText = xhr.responseText;
        let dataJSON = JSON.parse(responseText);

        if( dataJSON[0] === 'Error' ){
            alert('Error in Fetching');
        }else{
            editCategoryName = dataJSON['name'];
            editCategoryImage = dataJSON['image'];
            editCategorySlug = dataJSON['slug'];
            editCategoryDescription = dataJSON['detail'];

            editCategoryNameTextBox.value = editCategoryName;
            editCategorySlugTextBox.value = editCategorySlug;
            editCategoryDescriptionTextArea.value = editCategoryDescription;
            setImageDom(editCategoryImage);

        }

    }

}

editCategoryGetData(1);                     //TEST FUNCTION CALL

//--------------------------------Name Check-----------------------------------------

editCategoryNameTextBox.addEventListener( 'focusout' , function(){
    let categoryName = editCategoryNameTextBox.value;

    if( categoryNameRegex.test( categoryName ) ){
        editCategoryName = categoryName;
        editCategoryNameCheck = true;
    }else{
        editCategoryName = '';
        editCategoryNameCheck = false;
        alert( 'Category Name Syntax Error' );
    }

} );

//--------------------------------  SLUG CHECK  -----------------------------------------

var editCategorySlugTest = function(slugText){
    if(categorySlugRegex.test(slugText) == false || slugText.length > 25 || slugText.length < 3 ){
        editCategorySlugCheck = false;
        editCategorySlug = '';
        alert( 'Syntax Error' );
    }else{
        let tempSlug = '';
        let xhr = new XMLHttpRequest();
        xhr.open( 'post', editCheckSlugUrl );
        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');

        if( currentSlug === '' ){
            tempSlug = slugText;
        }else{
            for ( let i = editCategorySlug.value.length - 1 ; i > 0 ; i-- ){
                if( editCategorySlug.value.charAt(i) === '/' ){
                    tempSlug = editCategorySlug.substr( 0 , i );
                    tempSlug = tempSlug + slugText;
                    break;
                }
            }
        }

        xhr.send( 'slug='+tempSlug+'&parentID='+currentParentCategory+'&categoryID='+editCategoryID );

        xhr.onload = function(){
            let returnedDATA = xhr.responseText;
            console.log(returnedDATA);
            let dataJSON = JSON.parse(returnedDATA);

            if( dataJSON[0] === 'accepted' ){
                editCategorySlugCheck = true;
                editCategorySlug = tempSlug;
            }else {
                editCategorySlugCheck = false;
                editCategorySlug = '';
                alert( 'Entered Slug is already Exists' );
            }

        }

    }
}

editCategorySlugTextBox.addEventListener( 'focusout' , function () {
    editCategorySlugTest( editCategorySlugTextBox.value );
} );

//--------------------------------IMAGE UPLOAD---------------------------------------
editCategoryChooseImage .addEventListener('change',function(){

    //____________________________FILE CHECK________________________________________

    var fileName = editCategoryChooseImage .files[0].name;
    var ext = '';
    for ( var i = fileName.length ; i >= 0 ; i-- ){
        if( fileName.charAt(i) === '.' ){
            ext = fileName.substr( i, fileName.length );
        }
    }

    if ( ext === '.png' || ext === '.jpg' || ext === '.jpeg' ){
        //_____________________________DIMENSIONS CHECK______________________________________

        var fr = new FileReader();
        fr.readAsDataURL(editCategoryChooseImage.files[0]);
        fr.onload = function(){
            var img = new Image();
            img.src = fr.result;
            img.onload = function(){
                //console.log(img.naturalHeight + ' ' + img.naturalWidth );
                if( img.naturalHeight == 300 ){
                    editCategoryImageHeightCheck = true;
                }else{
                    editCategoryImage = '';
                    editCategoryImageCheck = false;
                    editCategoryImageHeightCheck = false;
                    editCategoryImageCheck = false;
                }

                if( img.naturalWidth == 1080 ){
                    editCategoryImageWidthCheck = true;
                }else{
                    editCategoryImage = '';
                    editCategoryImageCheck = false;
                    editCategoryImageWidthCheck = false;
                    editCategoryImageCheck = false;
                }

                if( editCategoryImageHeightCheck === true && editCategoryImageWidthCheck === true ){
                    const xhr = new XMLHttpRequest();
                    const formData = new FormData();

                    for( const file of editCategoryChooseImage.files ){
                        formData.append('myFiles[]',file);
                    }
                    xhr.open('post',uploadImagesUrl);
                    xhr.send(formData);
                    xhr.onload = function () {
                        if (xhr.status === 200){
                            const data = xhr.responseText;
                            const dataJson = JSON.parse(data);

                            if( dataJson[0] !== 'Error' ){
                                let clientImage = document.getElementById('editCategoryImageDisplay');
                                clientImage.style.display = 'block';
                                clientImage.src = dataJson[0];
                                editCategoryImage = dataJson[0];
                                editCategoryImageCheck = true;
                                editCategoryImageHeightCheck = true;
                                editCategoryImageWidthCheck = true;
                            }else{
                                editCategoryImage = '';
                                editCategoryImageCheck = false;
                                editCategoryImageHeightCheck = false;
                                editCategoryImageWidthCheck = false;
                                alert( 'Image Upload Error' );
                            }

                        }
                    }
                }else{
                    editCategoryImageCheck = false;
                    editCategoryImageHeightCheck = false;
                    editCategoryImageWidthCheck = false;
                    alert( 'Dimensions not matched' );
                }

            }

        }
    }else{
        editCategoryImageCheck = false;
        editCategoryImageHeightCheck = false;
        editCategoryImageWidthCheck = false;
        alert('Not Image File');
    }

});

//--------------------------------SUBMIT DATA----------------------------------------

editCategoryButton.addEventListener( 'click' , function(e){
    e.preventDefault();
    editCategoryDescription = editCategoryDescriptionTextArea.value;
    if ( editCategoryNameCheck === false ){
        alert( 'Set Category Name First' );
    }
    if ( editCategorySlugCheck === false ){
        alert( 'Set Category Slug First' );
    }
    if ( editCategoryImageCheck === false ){
        alert( 'Set Acceptable Category Image First' );
    }

    if ( editCategoryNameCheck === false && editCategorySlugCheck === false && editCategoryImageCheck === false ){
        alert( 'Page Error Refresh the page' );
    }else{
        const xhr = new XMLHttpRequest();
        const dataURL = `id=${editCategoryID}&name=${editCategoryName}&slug=${editCategorySlug}&image=${editCategoryImage}&detail=${editCategoryDescription}`;
        xhr.open( 'post', editCategoryUrl );
        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xhr.send( dataURL );

        xhr.onload = function () {
            let returnedData = xhr.responseText;
            let dataJSON = JSON.parse(returnedData);
            if( dataJSON[0] === 'successful' ){
                alert( 'Data Edited Successfully' );

            }else{
                alert( 'Connecctivity Error' );
            }
        }

    }

} );