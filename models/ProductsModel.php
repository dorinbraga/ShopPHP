<?php

//Pentru tabelul Producst

function getLastProducts($limit = null){
    $sql = "SELECT * FROM `products` ORDER BY id DESC";
    if($limit){
        $sql .= " LIMIT {$limit}";
    }
    
    $rs = db()->query($sql);
    
    return createSmartyRsArray($rs);
}

function getProductsByCat($itemId){
    $itemId=intval($itemId);
    $sql = "SELECT * FROM products WHERE category_id = '{$itemId}'";
    
    $rs = db()->query($sql);
    
    return createSmartyRsArray($rs);
}


//obtinerea batelor prin ID
function getProductById($itemId){
    $itemId= intval($itemId);
    $sql = "SELECT * FROM products WHERE id= '{$itemId}'";
    
    $rs = db()->query($sql);
    return $rs->fetch_assoc();
}


function getProductsFromArray($itemsIds){
    $strIds =  implode(', ',$itemsIds);
    $sql = "SELECT * FROM products WHERE id in({$strIds})";
    $rs = db()->query($sql);
    return createSmartyRsArray($rs);

   
}


function getProducts(){
    $sql ='SELECT * FROM products ORDER BY category_id';
    $rs = db()->query($sql);
    
    return createSmartyRsArray($rs);
}


function insertProduct($itemName, $itemPrice,$itemDesc,$itemCat){
    $sql="INSERT INTO products SET 
                         `name` = '{$itemName}',
                             `price`='{$itemPrice}',
                                 `description`='{$itemDesc}',
                                     `category_id`='{$itemCat}'";
    $rs = db()->query($sql);
    return $rs;
}


function updateProduct($itemId,$itemName,$itemPrice,$itemStatus,$itemDesc,$itemCat,$newFileName=null){
    $set=array();
    if($itemName){
        $set[]="`name` = '{$itemName}'";
    }
    if($itemPrice>0){
        $set[]="`price` = '{$itemPrice}'";
    }
    if($itemStatus !== null){
        $set[]="`status` = '{$itemStatus}'";
    }
    if($itemDesc){
        $set[]="`description` = '{$itemDesc}'";
    }
    if($itemCat){
        $set[]="`category_id` = '{$itemCat}'";
    }
    if($newFileName){
        $set[]="`image` = '{$newFileName}'";
    }
    $setStr =  implode(', ',$set);
    $sql="UPDATE products SET {$setStr} WHERE id='{$itemId}'";
    $rs = db()->query($sql);
    return $rs;
}


function updateProductImage ($itemId,$newFileName){
    
    $rs = updateProduct($itemId,null,null,
            null,null,null,$newFileName);
    
    return $rs;
}