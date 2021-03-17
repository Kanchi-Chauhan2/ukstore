var currentSlug = '';                                       //Changes over every selection of sub category
var currentParentCategory = php_currentParentCategory;                             //0 is for Home Category
var currentCategory = 0;
var categoryTable = php_categoryTable;

var uploadImagesUrl = 'http://localhost/ukstore/php/uploadImages.php';
var checkSlugUrl = 'http://localhost/ukstore/Admin/php/category/slugCheck.php';
var editCheckSlugUrl = 'http://localhost/ukstore/Admin/php/category/editSlugCheck.php';
var addCategoryUrl = 'http://localhost/ukstore/Admin/php/category/addCategory.php';
var editCategoryUrl = 'http://localhost/ukstore/Admin/php/category/editCategory.php';
var addSubcategoryUrl = "http://localhost/ukstore/Admin/php/category/addSubcategories_to_Supercategory.php";
var getCategoryUrl = 'http://localhost/ukstore/Admin/php/category/getCategory.php';

var categoryNameRegex = /^[a-z A-Z \s]+$/;
var categorySlugRegex = /^[a-z_]+$/;