

<?php
    session_start();
    require_once( "config.php" );
    require_once( "cart.php" );
    $cart = new cart();
    $action = strip_tags( $_GET["action"] );
    switch ($action) {
        case "add":
            $cart->addToCart();
            break;
        case "delete":
            $cart->deleteFromCart();
            break;
        case "update":
            $cart->updateCartQuantity();
            break;
        case "clearcart":
            $cart->clearCart();
            break;
        case "order":
            $cart->saveUser();
            break;    
    }
?>