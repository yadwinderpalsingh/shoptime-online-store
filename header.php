

<?php
    session_start();
    require_once("config.php");
    require_once("cart.php");

    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $active = $components[2];

    $cart = new cart();
    $cartCount = $cart->getCartCount();
    
?>
    <!DOCTYPE html>
    <html lang="en-US" class="no-js">

    <head>
        <!-- ==============================================
		Title and Meta Tags
        =============================================== -->
        <meta charset="utf-8">
        <title>Shoptime | it's the right time</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../assets/images/favicon.ico">
        <!-- ==============================================
		CSS
        =============================================== -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        <link rel="stylesheet" href="../assets/css/style.css"> 
    </head>

    <body>
        <header>
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="navbar-brand" href="../home/"><img src="../assets/images/logo.png" /></a>
                    </div>
                    <div class="shop-badge badge-icons pull-right">
						<a href="../cart/"><i class="fa fa-shopping-cart"></i></a>
						<span class="badge badge-sea rounded-x"><?php if($cartCount > 0) echo $cartCount ?></span>
					</div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li <?php if($active=='home' ) {echo 'class="active"';} ?>><a href="../home/">Home</a></li>
                            <?php
                                echo '<li ';
                                if($active == 'men') {echo 'class="active"';} 
                                echo '><a href="../men/">Men</a></li><li ';
                                if($active == 'women') {echo 'class="active"';} 
                                echo '><a href="../women/">Women</a></li><li ';
                                if($active == 'kids') {echo 'class="active"';} 
                                echo '><a href="../kids/">Kids</a></li>';
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>