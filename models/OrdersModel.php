<?php
/**
 * Creeare comenzii
 * 
 * @param string $name
 * @param string $phone
 * @param string $adress
 * @return integer ID 
 */
function makeNewOrder($name, $phone, $adress)
{
	
        $userId		=	$_SESSION['user']['id'];
	$comment	=	"id utilizatorului: {$userId}<br />
					Nume: {$name}<br />
					Tel: {$phone}<br />
					Adresa: {$adress}";
				
	$dateCreated	= date('Y.m.d H:i:s');
	$userIp		= $_SERVER['REMOTE_ADDR'];
	//<
	
	// adresarea la bd
	$sql = "INSERT INTO orders (`user_id`, `date_created`, `date_payment`, `status`,
            `comment`, `user_ip`)  
             VALUES ('{$userId}', '{$dateCreated}', null, '0', '{$comment}', '{$userIp}')";
	
   $rs = db()->query($sql);
   
   //obtinem id comenzii 
   if($rs){
	   $sql = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
           
	   $rs = db()->query($sql);
	   //conversia rezultatelor interogării
	   $rs = createSmartyRsArray($rs);
	   
	   // returnează ID-ul cererii create
	   if(isset($rs[0])){
		   return $rs[0]['id'];
	   }
   }
   
    return false;

}
/**
 * Obțineți o listă de comenzi legate de produse pentru utilizatorul $ userId
 * 
 * @param integer $userId ID user
 * @return array 
 */
function getOrdersWithProductsByUser($userId)
{	
	$userId = intval($userId);
	$sql = "SELECT * FROM orders
			WHERE `user_id` = '{$userId}'
			ORDER BY id DESC";
	
	$rs = db()->query($sql);

	$smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)) {
       	$rsChildren = getPurchaseForOrder($row['id']);

        if($rsChildren){
            $row['children'] = $rsChildren;
			$smartyRs[] = $row;
        } 
    }
   
   return $smartyRs;	
}

function getOrders(){
    $sql="SELECT o.*, u.name, u.email, u.phone, u.adress FROM orders AS `o`
         LEFT JOIN users AS `u` ON o.user_id = u.id ORDER BY id DESC";
    
    $rs = db()->query($sql);
    
    $smartyRs=array();
    while($row = mysqli_fetch_assoc($rs)){
        $rsChildren = getProductsForOrder($row['id']);
        
        if($rsChildren){
            $row['children']=$rsChildren;
            $smartyRs[]=$row;
        }
    }
    return $smartyRs;
            
}


function getProductsForOrder($orderId){
    $sql="SELECT * FROM purchase AS pe
          LEFT JOIN products AS ps
          ON pe.product_id=ps.id
          WHERE (`order_id` ='{$orderId}')";
        
    $rs = db()->query($sql);
    return createSmartyRsArray($rs);
          
}


function updateOrderStatus($itemId,$status){
    $status =intval($status);
    $sql="UPDATE orders SET `status` ='{$status}' WHERE id='{$itemId}'";
    $rs = db()->query($sql);
    return $rs;
}

function updateOrderDatePayment($itemId,$datePayment){
    $sql="UPDATE orders SET `date_payment`='{$datePayment}' WHERE id='{$itemId}'";
    $rs = db()->query($sql);
    return $rs;
}