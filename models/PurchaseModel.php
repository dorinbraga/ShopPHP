<?php



/**
 * Introducerea datelor despre produse în baza de date cu referire la comandă
 *
 * @param integer $orderId ID comenzii
 * @param array $cart lista cartului
 * @return boolean TRUE daca a fost adaugat in db
 */
function setPurchaseForOrder($orderId, $cart)
{
	$sql = "INSERT INTO purchase
			(order_id, product_id, price, amount) 
			VALUES ";
	
	$values = array();
	// formează o serie de șiruri de interogare pentru fiecare produs
	foreach ($cart as $item) {
		$values[] = "('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}')";
	}
	
	// convertiți matricea în șir
	$sql .= implode(', ',$values);
        $rs = db()->query($sql);
   
	 return $rs; 
}


function getPurchaseForOrder($orderId)
{
    $sql = "SELECT `pe`.*, `ps`.`name` 
            FROM purchase as `pe`
            JOIN products as `ps` ON `pe`.product_id = `ps`.id
            WHERE `pe`.order_id = {$orderId}";
   
    $rs = db()->query($sql);
    return createSmartyRsArray($rs); 
}