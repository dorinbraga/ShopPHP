<?php

function registerNewUser($email, $pwdMD5, $name, $phone, $adress)
{
    $email     = htmlspecialchars(db()->real_escape_string($email)); 
    $name     = htmlspecialchars(db()->real_escape_string($name)); 
    $phone    = htmlspecialchars(db()->real_escape_string($phone));
    $adress   = htmlspecialchars(db()->real_escape_string($adress));
    
    $sql = "INSERT INTO 
            users (`email`, `pwd`, `name`, `phone`, `adress`)  
            VALUES ('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$adress}')";

    $rs = db()->query($sql);
    

    if($rs){
	   $sql = "SELECT * FROM users  
				WHERE (`email` = '{$email}' and `pwd` = '{$pwdMD5}')
				LIMIT 1";
				
	   $rs = db()->query($sql);
	   $rs = createSmartyRsArray($rs);

	   if(isset($rs[0])){
		   $rs['success'] = 1;
	   } else {
		   $rs['success'] = 0;
	   }
	   
     } else {
	   
	   $rs['success'] = 0;
      }
   
   return $rs;   
}

function checkRegisterParams($email, $pwd1, $pwd2)
{
    $res = null;
    
    if(! $email){
        $res['success'] = false; 
        $res['message'] = 'Introduceti email'; 
    }
    
    if(! $pwd1){
        $res['success'] = false; 
        $res['message'] = 'Introduceti parola'; 
    }
    
    if(! $pwd2){
        $res['success'] = false; 
        $res['message'] = 'Reintroduceti parola'; 
    }
    
    if($pwd1 != $pwd2){
        $res['success'] = false; 
        $res['message'] = 'Parola nu corespunde'; 
    }
    
    return $res;
}

function checkUserEmail($email)
{
     //$email = mysqli_real_escape_string($email);
     $sql = "SELECT id FROM users WHERE email = '{$email}'";
     
     $rs = db()->query($sql);
     $rs = createSmartyRsArray($rs);
     
     return $rs;
}

function loginUser($email, $pwd)
{
    $email     = htmlspecialchars(db()->real_escape_string($email));
    $pwd     = md5($pwd);
    
    $sql = "SELECT * FROM users  
            WHERE (`email` = '{$email}' and `pwd` = '{$pwd}')
            LIMIT 1";

   $rs = db()->query($sql);
  
   $rs = createSmartyRsArray($rs);
   if(isset($rs[0])){
            $rs['success'] = 1;
   } else {
	   $rs['success'] = 0;
   }
    
   return $rs;
}

function updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwd)
{
   $email   = htmlspecialchars(db()->real_escape_string($_SESSION['user']['email']));
   $name    = htmlspecialchars(db()->real_escape_string($name));
   $phone   = htmlspecialchars(db()->real_escape_string($phone));
   $adress  = htmlspecialchars(db()->real_escape_string($adress));
   $pwd1 = trim($pwd1);
   $pwd2 = trim($pwd2);
   
   $newPwd = null;
   if( $pwd1 && ($pwd1 == $pwd2) ){
	   $newPwd = md5($pwd1);
   }
   
   $sql = "UPDATE users 
            SET ";
   
   if($newPwd){
	   $sql .= "`pwd` = '{$newPwd}', ";
   }
   
  $sql .= " `name` = '{$name}', 
            `phone` = '{$phone}', 
            `adress` = '{$adress}'
           WHERE 
            `email` = '{$email}' AND `pwd` = '{$curPwd}'
           LIMIT 1";

   $rs = db()->query($sql); 
	
	
    return $rs;
}

/**
 * Obțineți detaliile comenzii utilizatorului curent
 * 
 * @return array o serie de comenzi legate de produse
 */
function getCurUserOrders()
{
	$userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
	$rs = getOrdersWithProductsByUser($userId);
	
	return $rs;
}