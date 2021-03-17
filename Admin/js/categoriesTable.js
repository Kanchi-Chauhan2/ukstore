var categoryTableDOM = document.querySelector('.categories__table tbody');

//----------------------------------SET CATEGORIES TABLE DATA   ---------------------------------

var setCategoryTableData = function(tableData){
    Array.from( tableData ).forEach( (tdata,i) => {
        let td = new Array();
        for( let index = 0; index < 5 ; index++ ){
            td[index] = document.createElement( 'td' );
        }
        td[0].textContent = tdata['id'];
        td[1].textContent = tdata['name'];
        td[2].textContent = tdata['detail'];
        td[3].textContent = tdata['totalProducts'];
        let spanEdit = document.createElement( 'span' );
        let spanDelete = document.createElement( 'span' );
        spanEdit.classList.add('categories__table--edit');
        spanEdit.textContent = 'EDIT';
        spanDelete.classList.add('categories__table--delete');
        spanDelete.textContent = 'DELETE';
        spanEdit.dataset.id = tdata['id'];
        spanDelete.dataset.id = tdata['id'];
        td[1].dataset.id = tdata['id'];
        td[4].appendChild(spanEdit);
        td[4].appendChild(spanDelete);
        let tableROW = document.createElement('tr');
        for( let index = 0; index < 5 ; index++ ){
            tableROW.appendChild(td[index]);
        }
        categoryTableDOM.appendChild(tableROW);
    } );
}

setCategoryTableData(categoryTable);

