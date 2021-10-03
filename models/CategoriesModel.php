<?php

function getChildrenForCat($catId){
    $sql = "SELECT * FROM categories WHERE parent_id = '{$catId}'";
    $rs = db()->query($sql);
    return createSmartyRsArray($rs);
}


function getAllMainCatsWithChildren(){
    $sql = 'SELECT * FROM categories WHERE parent_id = 0';
    
    $rs = db()->query($sql);
    $smartyRs = array();
    while($row = $rs->fetch_assoc()) {
            $rsChildren = getChildrenForCat($row['id']);
        if($rsChildren){
            $row['children'] = $rsChildren;
        }
            $smartyRs[]= $row;
    }
    
    return $smartyRs;
}


function getCatById($catId){
    $catId = intval($catId);
    $sql = "SELECT * FROM categories WHERE id = '{$catId}'";
    
    $rs = db()->query($sql);
    
    return $rs->fetch_assoc();
}

//obtine toate categoriile principale(care nu sunt copii)
function getAllMainCategories(){
    $sql='SELECT * FROM categories WHERE parent_id = 0';
    $rs = db()->query($sql);
    
    return createSmartyRsArray($rs);
}

function insertCat($catName,$catParentId = 0 ){
    
    $sql="INSERT INTO categories (`parent_id`, `name`) VALUES ('{$catParentId}', '{$catName}')";
    $id =  db()->query($sql);
    
   return $id;
}

function getAllCategories(){
    $sql = 'SELECT * FROM categories ORDER BY parent_id ASC';
    $rs = db()->query($sql);
     
    return createSmartyRsArray($rs);
}

function updateCategoryData($itemId,$parentId=-1, $newName=''){
    $set = array();
    
    if($newName){
        $set[]="`name` = '{$newName}'";
    }
    
    if($parentId >-1){
        $set[]="`parent_id` = '{$parentId}'";
    }
    
    $setStr=implode(', ', $set);
    
    $sql="UPDATE categories SET {$setStr} WHERE id='{$itemId}'";
    
    $rs = db()->query($sql);
    return $rs;
}