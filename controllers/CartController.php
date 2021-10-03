<?php

/**
 *  cartController.php
 * 
 *  Controller ce raspounde de cart (/cart/)
 * 
 */


include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';






 function addtocartAction(){
     $itemId = isset($_GET['id']) ? intval($_GET['id']) : null; 
     if(! $itemId) return false;
	 
     $resData = array();

     // daca valoarea nu a fost gasita , atunci o adaugam
     if(isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false){
         $_SESSION['cart'][] = $itemId;
         $resData['cntItems'] = count($_SESSION['cart']);
         $resData['success'] = 1;
     } else {
         $resData['success'] = 0;
     }

     echo json_encode($resData);
  }
  
  
  function removefromcartAction(){
     $itemId = isset($_GET['id']) ? intval($_GET['id']) : null; 
     if(! $itemId) exit();
     
     $resData = array();
     $key = array_search($itemId, $_SESSION['cart']);
     if($key !== false){
         unset($_SESSION['cart'][$key]);
         $resData['success'] = 1;
          $resData['cntItems'] = count($_SESSION['cart']);
     } else {
         $resData['success'] = 0;
     }
     
     echo json_encode($resData);
  }
  
 /**
  * Фformaarea paginii cart
  * @link /cart/
  */
 function indexAction($smarty){
    
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

    $rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getProductsFromArray($itemsIds);
    
    $smarty->assign('pageTitle', 'Корзина');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
 }
function orderAction($smarty){
 //obtinem  o serie de identificatori a produselor din cos(ID)
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
	// dacă coșul este gol, redirecționați către coș
    if(! $itemsIds){
		redirect('/cart/');
		return;
	}
        //din lista $_POST obtinem cantitatea produselor
    $itemsCnt = array();
    foreach($itemsIds as $item){
		// genera o cheie pentru matricea POST
        $postVar = 'itemCnt_' . $item;
		
        $itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;
    }
	
	// obțineți o listă de produse după gama de coșuri
    $rsProducts = getProductsFromArray($itemsIds);
	
	//adaugam fiecarui product un camp suplimentar   
	// "realPrice = cantitate * pret"
	// "cnt" = cantiatea
	
	// &$item - astfel încât atunci când variabila se schimbă $item 
	// se schimba si elementul listei $rsProducts
	$i = 0;
    foreach($rsProducts as &$item){
        $item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
        if($item['cnt']){
            $item['realPrice'] = $item['cnt'] * $item['price'];
        } else {
			// daca in cart avem un produs iar cantitaea == null
			// stergem produsul
            unset($rsProducts[$i]);
        }
        $i++;
    }
	
	if(! $rsProducts){
		echo "Cos gol";
		return;
	}
	
	// matricea rezultată de produse cumpărate este plasată într-o variabilă de sesiune
    $_SESSION['saleCart'] = $rsProducts;
	
	$rsCategories = getAllMainCatsWithChildren();
    
	// hideLoginBox variabilă - un steag pentru a ascunde blocurile de autentificare și înregistrare
	
	if(! isset($_SESSION['user'])){
		$smarty->assign('hideLoginBox', 1);
	}
	
    $smarty->assign('pageTitle', 'Comanda');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
     
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'order');
    loadTemplate($smarty, 'footer');
	
 }
   /**
  *  AJAX functia pentru salvare
  * 
  * @param array $_SESSION['saleCart']
  * @return json 
  */
 function saveorderAction()
 {
	 // obtinem o lista cu produsele cumparate
	$cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;
	
	if(! $cart){
		$resData['success'] = 0; 
        $resData['message'] = 'Nu sunt produse pentru comanda'; 
		echo json_encode($resData);
		return;
	}
	
	$name	= $_POST['name'];
	$phone	= $_POST['phone'];
	$adress = $_POST['adress'];
	
	//facem o noua comanda si obtinem id-ul 
	$orderId = makeNewOrder($name, $phone, $adress);
	
        
        
	if(! $orderId){
		$resData['success'] = 0; 
        $resData['message'] = 'Eroare in crearea comenzii'; 
		echo json_encode($resData);
		return;
	} 
	
	// salvam comanda
	$res = setPurchaseForOrder($orderId, $cart);
	
	//pentru succes
	if($res){
		$resData['success'] = 1; 
        $resData['message'] = 'Comanda salvata';
		unset($_SESSION['saleCart']);
		unset($_SESSION['cart']);
	} else {
        $resData['success'] = 0; 
        $resData['message'] = 'Eroare de introducere a datelor pentru comanda Nr. ' . $orderId; 
    }
	
	echo json_encode($resData);
 }
 
