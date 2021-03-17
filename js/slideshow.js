var slideShowContainer = document.querySelector('.slideshow');
var slideDots = document.getElementsByClassName('slide__select--dot');

var slides = document.getElementsByClassName('slide');
var slideHeading = document.getElementsByClassName('slide__content--heading');
var slideDetail = document.getElementsByClassName('slide__content--detail');
var slideParagraph = document.getElementsByClassName('slide__content--paragraph');
var slideLink = document.getElementsByClassName('slide__content--link');

var slidePerfom = true;


var slideIN = function(slideNumber,slide,heading,detail,paragraph,link){

    if( slidePerfom === false ){
        setTimeout( function(){
            if( slideNumber === 0 ){
                slideShowContainer.style.backgroundColor = '#fff';
            }else{
                slideShowContainer.style.backgroundColor = '#f5dcd7';
            }
            slide.style.display = 'block';
            heading.style.visibility = 'visible';
            detail.style.visibility = 'visible';
            paragraph.style.visibility = 'visible';
            link.style.visibility = 'visible';
            slide.style.animation = 'slideIN 1s';
            heading.style.animation = 'slideContentIN 2s';
            detail.style.animation = 'slideContentIN 2.4s';
            paragraph.style.animation = 'slideContentIN 2.8s';
            link.style.animation = 'slideContentIN 3.2s';
        }, 2000 );
        setTimeout( function(){
            slide.style.animation = 'unset';
            heading.style.animation = 'unset';
            detail.style.animation = 'unset';
            paragraph.style.animation = 'unset';
            link.style.animation = 'unset';
        },4400 );
    }

}

var slideOUT = function(slide,heading,detail,paragraph,link){
    
    if( slidePerfom === false ){
        slide.style.display = 'block';
        heading.style.animation = 'slideContentOUT 3.2s';
        detail.style.animation = 'slideContentOUT 2.8s';
        paragraph.style.animation = 'slideContentOUT 2.4s';
        link.style.animation = 'slideContentOUT 2s';
        
        setTimeout( function(){
            link.style.visibility = 'hidden';
        },1000 );
        
        setTimeout( function(){
            paragraph.style.visibility = 'hidden';
        },1200 );
        
        setTimeout( function(){
            detail.style.visibility = 'hidden';
        },1400 );
        
        setTimeout( function(){
            heading.style.visibility = 'hidden';
        },1600 );
        
        setTimeout( function(){
            slide.style.animation = 'slideOUT 1s';
        },2000 );
        
        setTimeout( function(){
            slide.style.display = 'none';
            slide.style.animation = 'unset';
        },3000 );
    }
    
}


Array.from(slideDots).forEach( (dot,index) => {
    dot.addEventListener( 'click',function(){

        if( slidePerfom === true ){
            slidePerfom = false;
            setTimeout( function(){slidePerfom = true;},4400 ); // FOR WAKING UP ANIAMTION
            Array.from( slideDots ).forEach(d=>{
                d.style.opacity = '0.6';
            });
            dot.style.opacity = '1';

            // ADDING COMPONENTS
            let toggleIndex = 0;
            if( index === 0 ){
                toggleIndex = 1;
            }
            slideIN(index,slides[index],slideHeading[index],slideDetail[index],slideParagraph[index],slideLink[index]);
            slideOUT(slides[toggleIndex],slideHeading[toggleIndex],slideDetail[toggleIndex],slideParagraph[toggleIndex],slideLink[toggleIndex]);

        }
    } );
} );

