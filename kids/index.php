
<?php
    include('../header.php');

    $cart = new cart();
    $products = $cart->getProducts('Kids');
?>

    <div class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="category">
                    <h2>Kids</h2>
                </div>

                <div class="results">
                    <div class="row">
                        <?php
                            foreach($products as $product) {
                        ?>
                        <div class="col-sm-6 col-md-4 item">
                            <div class="product-img">
                                <img class="full-width img-responsive" src="../assets/images<?php print $product->image; ?>" alt="">
                            </div>
                            <a class="add-to-cart" data-id="<?php print $product->id; ?>" href="javascript:void()"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                            <div class="product-description margin-bottom-30">
                                <div class="pull-left">
                                    <h4 class="title-price"><?php print $product->product; ?></h4>
                                    <span class="gender text-uppercase"><?php print $product->gender; ?></span>
                                </div>
                                <div class="product-price">
                                    <span class="title-price">$<?php print $product->price; ?></span>
                                </div>
                            </div>
                        </div>
                        <?php 
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include('../footer.php');
?>