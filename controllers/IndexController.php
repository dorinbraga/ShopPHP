<?php

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';


function testAction(){
    echo 'IndexController.php >testAction';
}


function indexAction($smarty){
    /** @var type $rsCategories */
    $rsCategories = getAllMainCatsWithChildren();
    
    $rsProducts = getLastProducts(16);
    
    
    $smarty -> assign('pageTitle','Maine page');
    $smarty -> assign('rsCategories',$rsCategories);
    $smarty -> assign('rsProducts',$rsProducts);
    
    loadTemplate($smarty,'header');
    loadTemplate($smarty,'index');
    loadTemplate($smarty,'footer');
    
}
