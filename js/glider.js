//---------------------------------------GLIDING ALGO---------------------------------------

var rightMove = function( pw , bw , cw , cl , r ){
    if( cl < (cw - bw) ){
        if( (cw - bw) > cl + (pw*r) ){
            return cl + pw*r;
        }else{
            return cw-bw;
        }
    }else{
        return cl;
    }
}

var leftMove = function( pw , bw , cw , cl , r ){
    if( cl <= (cw-bw) ){
        if( cl > (pw*r) ){
            return cl - (pw*r);
        }else{
            return 0;
        }
    }else{
        return 0;
    }
}


//---------------------------------------NEW CONTAINER------------------------------------------------


var productWidth = 300;
var newContainerWidth = newContainer.getBoundingClientRect().width;
var newBoxWidth = newBox.getBoundingClientRect().width;
var newBoxProductItemsCount = newBoxWidth/productWidth;

if( window.innerWidth <= 450 ){
    window.productWidth = 210;
}else if( window.innerWidth <= 768 ){
    window.productWidth = 240;
}

newContainerButtonRight.addEventListener( 'click' , function(){
    let cl = newContainer.style.left;
    let r = 0;
    if( cl === '' ){
        cl = parseInt("0");
    }else{
        let temp = cl.substr(0,cl.length-2);
        cl = parseInt(temp);
    }

    if( parseInt(newBoxProductItemsCount) < 1 ){
        r = 1;
    }else{
        r = parseInt(newBoxProductItemsCount);
    }

    cl = rightMove( productWidth , newBoxWidth , newContainerWidth , cl*-1 , r );
    newContainer.style.left = (cl*-1)+'px';
    
} );
newContainerButtonLeft.addEventListener( 'click' , function(){
    let cl = newContainer.style.left;
    let r = 0;
    if( cl === '' ){
        cl = parseInt("0");
    }else{
        let temp = cl.substr(0,cl.length-2);
        cl = parseInt(temp);
    }

    if( parseInt(newBoxProductItemsCount) < 1 ){
        r = 1;
    }else{
        r = parseInt(newBoxProductItemsCount);
    }

    cl = leftMove( productWidth , newBoxWidth , newContainerWidth , cl*-1 , r );

    newContainer.style.left = (cl*-1)+'px';
} )


//-----------------------------------------BLOCK BUSTER CONTAINER----------------------------------

var blockbusterContainerWidth = newContainer.getBoundingClientRect().width;
var blockbusterBoxWidth = newBox.getBoundingClientRect().width;
var blockbusterBoxProductItemsCount = newBoxWidth/productWidth;

blockbusterContainerButtonRight.addEventListener( 'click' , function(){
    let cl = blockbusterContainer.style.left;
    let r = 0;
    if( cl === '' ){
        cl = parseInt("0");
    }else{
        let temp = cl.substr(0,cl.length-2);
        cl = parseInt(temp);
    }

    if( parseInt(blockbusterBoxProductItemsCount) < 1 ){
        r = 1;
    }else{
        r = parseInt(blockbusterBoxProductItemsCount);
    }

    cl = rightMove( productWidth , blockbusterBoxWidth , blockbusterContainerWidth , cl*-1 , r );
    blockbusterContainer.style.left = (cl*-1)+'px';
    
} );

blockbusterContainerButtonLeft.addEventListener( 'click' , function(){
    let cl = blockbusterContainer.style.left;
    let r = 0;
    if( cl === '' ){
        cl = parseInt("0");
    }else{
        let temp = cl.substr(0,cl.length-2);
        cl = parseInt(temp);
    }

    if( parseInt(blockbusterBoxProductItemsCount) < 1 ){
        r = 1;
    }else{
        r = parseInt(blockbusterBoxProductItemsCount);
    }

    cl = leftMove( productWidth , blockbusterBoxWidth , blockbusterContainerWidth , cl*-1 , r );
    console.log(cl*-1);
    
    blockbusterContainer.style.left = (cl*-1)+'px';
} );

window.addEventListener('resize',function(){
    newContainerWidth = newContainer.getBoundingClientRect().width;
    newBoxWidth = newBox.getBoundingClientRect().width;
    newBoxProductItemsCount = newBoxWidth/productWidth;
    newContainer.style.left = '0px';

    blockbusterContainerWidth = blockbusterContainer.getBoundingClientRect().width;
    blockbusterBoxWidth = blockbusterBox.getBoundingClientRect().width;
    blockbusterBoxProductItemsCount = blockbusterBoxWidth/productWidth;
    blockbusterContainer.style.left = '0px';

    if( window.innerWidth <= 450 ){
        window.productWidth = 210;
    }else if( window.innerWidth <= 768 ){
        window.productWidth = 240;
    }

});
