<?php


include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';


function registerAction(){
     $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    
    $phone  = isset($_REQUEST['phone'])  ? $_REQUEST['phone']  : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name   = isset($_REQUEST['name'])   ? $_REQUEST['name']   : null;
    $name = trim($name);
 
	
    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2); 
	
    if(! $resData && checkUserEmail($email)){
        $resData['success'] = false; 
        $resData['message'] = "Utilizator cu astfel email('{$email}') e deja inregistrat"; 
    }
	
    if(! $resData ){
        $pwdMD5 = md5($pwd1);

        $userData = registerNewUser($email, $pwdMD5, $name, $phone, $adress);
        
	if($userData['success']){
                $resData['message'] = 'Inregistrat cu succes!'; 
                $resData['success'] = 1; 
			
		$userData = $userData[0];
		$resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
		$resData['userEmail'] = $email;
        
		$_SESSION['user'] = $userData;
		$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        } else {
            $resData['success'] = 0; 
            $resData['message'] = 'Eroare de inregistrare'; 
        }  
      
   }
   
   echo json_encode($resData);
}

function logoutAction(){
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
	unset($_SESSION['cart']);

    }
    
    redirect('/');
}

function loginAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
    $pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
    $pwd = trim($pwd);
	
    $userData = loginUser($email, $pwd);
	
    if($userData['success']){
                $userData = $userData[0];

		$_SESSION['user'] = $userData;
		$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
		
		$resData = $_SESSION['user'];
		$resData['success'] = 1;
        
		//$resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        //$resData['userEmail'] = $email;
		
    } else {
        $resData['success'] = 0; 
        $resData['message'] = 'login sau parola incorecta'; 
    }
    
    echo json_encode($resData);
	
}

function indexAction($smarty){
    
    // daca utilizatorul nu sa login
	if(! isset($_SESSION['user'])){
       redirect('/');
    }
    
    //obtinem lista cu categorii 
     $rsCategories = getAllMainCatsWithChildren();
	
    
     $rsUserOrders = getCurUserOrders();
     
     $smarty->assign('pageTitle', 'Pagina utilizatorului');
     $smarty->assign('rsCategories', $rsCategories);
      $smarty->assign('rsUserOrders', $rsUserOrders);


    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'user');
    loadTemplate($smarty, 'footer');
}


function updateAction(){
	//>
    if(! isset($_SESSION['user'])){
       redirect('/');
    }
	//<
	
	//> 
    $resData = array();
    $phone  = isset($_REQUEST['phone'])  ? $_REQUEST['phone']	: null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress']	: null;
    $name   = isset($_REQUEST['name'])   ? $_REQUEST['name']	: null;
    $pwd1   = isset($_REQUEST['pwd1'])	 ? $_REQUEST['pwd1']	: null;
    $pwd2   = isset($_REQUEST['pwd2'])	 ? $_REQUEST['pwd2']	: null;
    $curPwd = isset($_REQUEST['curPwd']) ? $_REQUEST['curPwd']	: null;
	//<
	
	//verificam parola 
	$curPwdMD5 = md5($curPwd);
	if( ! $curPwd || ($_SESSION['user']['pwd'] != $curPwdMD5) ){
		$resData['success'] = 0;
		$resData['message'] = 'Текущий пароль не верный';
		echo json_encode($resData);
		return false;
	}
	
	// refresh data
	$res = updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwdMD5);
	if($res){
		$resData['success'] = 1;
		$resData['message'] = 'Datele au fost salvate';
		$resData['userName'] = $name;
		
		$_SESSION['user']['name']	= $name;
		$_SESSION['user']['phone']	= $phone;
		$_SESSION['user']['adress']     = $adress;
			
		$newPwd = $_SESSION['user']['pwd'];
		if( $pwd1 && ($pwd1 == $pwd2) ){
			$newPwd = md5(trim($pwd1));
		}
		$_SESSION['user']['pwd'] = $newPwd;
		
		$_SESSION['user']['displayName'] = $name ? $name : $_SESSION['user']['email'];
		
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Eroare de salvare a datelor';
	}
	
	echo json_encode($resData);
	
}
