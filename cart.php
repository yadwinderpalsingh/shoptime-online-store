
<?php

class Cart {

 private $dbConnection;

    function __construct() {
        $this->dbConnection = new mysqli(MYSQLSERVER, MYSQLUSER, MYSQLPASSWORD, MYSQLDB);
    }

    function __destruct(){
        $this->dbConnection->close();
    }

    public function getProducts($gender){
        $arr = array();
        $dbConnection = $this->dbConnection;
        $dbConnection->query( "SET NAMES 'UTF8'" );
        $statement = $dbConnection->prepare( "select Id, ProductName, Price, Gender, Image from Products where Gender=?");
        $statement->bind_param( 's', $gender);
        $statement->execute();
        $statement->bind_result( $Id, $ProductName, $Price, $Gender, $Image);
        while ( $statement->fetch() ) {
            $line = new stdClass;
            $line->id = $Id; 
            $line->product = $ProductName; 
            $line->price = $Price;
            $line->gender = $Gender;
            $line->image = $Image;
            $arr[] = $line;
        }
        $statement->close();
        return $arr;
    }
    
    public function updateCartQuantity() {
        $id = intval($_GET["id"]);
        $quantity = intval($_GET["quantity"]);
        
        $price = 0;
        
        if($id > 0) {
            if($_SESSION['cart'] != "") {
                $cart = json_decode( $_SESSION['cart'], true);
                for($i=0; $i<count($cart); $i++) {
                    if($cart[$i][ "product" ] == $id) {  
                        $cart[$i]["count"] = $quantity;
                        $lines = $this->getProductData($cart[$i]["product"]); 
                        $line->price = $lines->price;
                        break;
                    }
                } 
                $_SESSION['cart'] = json_encode($cart);
            }
        }
        
        echo json_encode(array("subTotal" => $this->getTotal(), "price" => $lines->price*$cart[$i]["count"]));
    }
    
    public function deleteFromCart(){
        $id = intval($_GET["id"]);
        if($id > 0) {
            if($_SESSION['cart'] != "") {
                $cart = json_decode( $_SESSION['cart'], true);
                for($i=0; $i<count($cart); $i++) {
                    if($cart[$i][ "product" ] == $id) {  
                        array_splice($cart, $i, 1);
                        var_dump($cart);
                        break;
                    }
                }
                $_SESSION['cart'] = json_encode($cart);
            } 
        }
    }
    
    public function clearCart(){
        $_SESSION['cart'] = "";
    }

    public function addToCart() {
        $id = intval($_GET["id"]);
        if($id > 0) {
            if($_SESSION['cart'] != "") {
                $cart = json_decode( $_SESSION['cart'], true);
                $found = false;
                for($i=0; $i<count($cart); $i++) {
                    if($cart[$i][ "product" ] == $id) {  
                        $cart[$i]["count"] = $cart[$i]["count"] + 1;
                        $found = true;
                        break;
                    }
                }
                if(!$found) {
                    $line = new stdClass;
                    $line->product = $id; 
                    $line->count = 1;
                    $cart[] = $line;
                }
                $_SESSION['cart'] = json_encode($cart);
            } 
            else 
            {
                $line = new stdClass;
                $line->product = $id; 
                $line->count = 1;
                $cart[] = $line;
                $_SESSION['cart'] = json_encode($cart);
            }
        }
        
        echo $this->getCartCount();
    }
    
    public function getCartCount(){
        $cartCount = 0;
        if($_SESSION['cart'] != "") {
            $cart = json_decode( $_SESSION['cart'], true);
            $cartCount = count($cart);
        }
        
        return $cartCount;
    }
 
    public function getCart(){ 
        $cartArray = array(); 
        if($_SESSION['cart'] != ""){ 
            $cart = json_decode($_SESSION['cart'], true); 
            for($i=0;$i<count($cart);$i++){ 
                $lines = $this->getProductData($cart[$i]["product"]); 
                $line = new stdClass; 
                $line->id = $cart[$i]["product"]; 
                $line->count = $cart[$i]["count"]; 
                $line->product = $lines->product; 
                $line->image = $lines->image;
                $line->price = $lines->price;
                $line->total = ($lines->price*$cart[$i]["count"]); 
                $cartArray[] = $line; 
            }
        }
        return $cartArray; 
    } 
    
    public function getTotal(){ 
        $total = 0;
        if($_SESSION['cart'] != ""){ 
            $cart = json_decode($_SESSION['cart'], true); 
            for($i=0;$i<count($cart);$i++){ 
                $lines = $this->getProductData($cart[$i]["product"]); 
                $total = ($lines->price*$cart[$i]["count"]) + $total;
            }
        }
        return $total; 
    } 

    private function getProductData($id) {
        $dbConnection = $this->dbConnection;
        $dbConnection->query( "SET NAMES 'UTF8'" );
        $statement = $dbConnection->prepare( "select ProductName, Price, Gender, Image from Products where Id=?" );
        $statement->bind_param( 's', $id);
        $statement->execute();
        $statement->bind_result( $ProductName, $Price, $Gender, $Image);
        $statement->fetch();
        $line = new stdClass;
        $line->product = $ProductName; 
        $line->price = $Price;
        $line->gender = $Gender;
        $line->image = $Image;
        $statement->close();
        return $line;
    }
 }
?>