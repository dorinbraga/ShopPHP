<?php
//Controler pentru pagina productului

include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

//formarea paginii productului
function indexAction($smarty){
    $itemId= isset($_GET['id']) ? $_GET['id'] : nul;
    if($itemId == null) exit();
    
    //primirea datekor productului
    $rsProduct = getProductById($itemId);
    
    //primirea toate categoriilor
    $rsCategories  = getAllMainCatsWithChildren();
    
    $smarty->assign('itemInCart',0);
    if(in_array($itemId, $_SESSION['cart'])){
        $smarty->assign('itmeInCart',1);
    }
    
    $smarty ->assign('pageTitle','');
    $smarty ->assign('rsCategories',$rsCategories);
    $smarty ->assign('rsProduct',$rsProduct);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}
