var productName = '';
var productDetail = '';
var categoryID = 0;
var categoryName = '';
var productImages = new Array();
var attributesID = new Array();
var attributes = new Array();
var prices = new Array();
var sellingPrices = new Array();
var stockes = new Array();
var actives = new Array();
var date = '';
var tax = '';
var taxID = 0;

var currency = '$';
var quantity = 1;
var attributeIndex = 0;
var selectedAttributes = new Array();
var selectedPrice = 0;

if( php_product.isProduct === undefined ){
    //--------------------------IF NO PRODUCT-----------------------------------
    console.log('No Product');
}else{
    //--------------------------IF PRODUCT-----------------------------------
    productName = php_product.name;
    productDetail = php_product.detail;
    categoryID = php_product.categoryID;
    categoryName = php_product.categoryName;
    productImages = php_product.images;
    attributesID = php_product.attributesID;
    attributes = php_product.attributes;
    prices = php_product.prices;
    sellingPrices = php_product.sellingPrices;
    stockes = php_product.stockes;
    date = php_product.date;
    tax = php_product.tax;
    taxID = php_product.taxID;
}
