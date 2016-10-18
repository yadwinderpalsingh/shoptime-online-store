

<?php
    include('../header.php');

    $cart = new cart();
    $products = $cart->getCart();
    $subTotal = $cart->getTotal();
?>
    <div class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="category">
                    <h2>Your Cart</h2> 
                     <?php 
                        if(count($products) > 0 ) {
                    ?>
                        <button class="btn btn-default btn-clear-cart pull-right"><i class="fa fa-times"></i> Clear Cart</button>
                    <?php 
                        }
                    ?>
                </div>
                <div class="results shopping-cart">
                    <?php 
                        if(count($products) > 0 ) {
                    ?>
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($products as $product){
                                ?>
                                    <tr>
                                        <td class="product-in-table"> <img class="img-responsive" src="../assets/images<?php print $product->image; ?>" alt="">
                                            <div class="product-it-in">
                                                <h3><?php print HtmlSpecialChars($product->product); ?></h3> </div>
                                        </td>
                                        <td>$ <?php print $product->price; ?></td>
                                        <td>
                                            <button type="button" class="quantity-button subtract">-</button>
                                            <input type="text" disabled class="quantity-field" data-id="<?php print $product->id; ?>" value="<?php print $product->count; ?>">
                                            <button type="button" class="quantity-button add">+</button>
                                        </td>
                                        <td class="shop-red">$ <?php print $product->total; ?></td>
                                        <td>
                                            <button type="button" data-id="<?php print $product->id; ?>" class="close"><span>×</span><span class="sr-only">Close</span></button>
                                        </td>
                                    </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="sub-total">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-9">
                                <ul class="list-inline total-result">
                                    <li class="total-price">
                                        <h4>Sub total:</h4>
                                        <div class="total-result-in">
                                            <span>$ <?php print $subTotal ?></span>
                                        </div>
                                    </li>
                                </ul>
                                
                                <a href="../order/" class="btn btn-default pull-right margin-top-30">Next <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                        } 
                    ?>
                    
                    <div class="empty-cart text-center <?php if(count($products) > 0  ) {echo 'hidden';} ?>">
                        <h3>Your cart is currently empty.</h3>
                        <a class="btn btn-default" href="../home/"><i class="fa fa-long-arrow-left"></i> Return to shop</a>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
   
<?php
    include('../footer.php');
?>