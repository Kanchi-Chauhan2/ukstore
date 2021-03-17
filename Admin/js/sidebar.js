//Accordions On Click Event--------------------------------------

var sidebarAccordions = document.getElementsByClassName('sidebar__accordion--box');
var sidebarAccordionsList = document.querySelectorAll('.sidebar__accordion ul');
var sidebarAccordionsArrow = document.getElementsByClassName('sidebar__accordion--arrow');
var currentActiveAccordion = -1;

Array.from(sidebarAccordions).forEach( (accordion,index) => {
    accordion.addEventListener( 'click' , function(event){
        let height = 0;

        if(currentActiveAccordion === index){
            sidebarAccordionsArrow[index].style.transform = 'rotateZ(0deg)';
            sidebarAccordionsList[index].style.height = '0px';
            currentActiveAccordion = -1;
        }else{
            Array.from(sidebarAccordionsList).forEach( (list,i) => {
                list.style.height = '0px';
                sidebarAccordionsArrow[i].style.transform = 'rotateZ(0deg)';
                if( i === index ){
                    height = list.scrollHeight;
                }
            } );
            sidebarAccordionsArrow[index].style.transform = 'rotateZ(90deg)';
            sidebarAccordionsList[index].style.height = height+'px';
            currentActiveAccordion = index;
        }
        
    } );
} )