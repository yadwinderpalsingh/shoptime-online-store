

<?php
    include('../header.php');

    $cart = new cart();
    $products = $cart->getCart();
    $subTotal = $cart->getTotal();
    $cartCount = count($products);
        
    if($cartCount == 0){
        header("Location: /shoptime-online-store/home/");
    }

?>
    <div class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="billing-section">
                    <div class="category">
                        <h2>Billing and Shipping Info <?php print $cartCount ?></h2> </div>
                    <div class="results">
                        <form id="contact-form" class="col-sm-10 col-sm-offset-1">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input id="first-name" name="firstName" class="form-control requiredField" type="text" data-error-empty="is required">
                                            <label class="control-label" for="first-name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <input id="email" name="email" class="form-control requiredField" type="email" data-error-empty="is required" data-error-invalid="is invalid">
                                            <label class="control-label" for="email">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input id="last-name" name="lastName" class="form-control requiredField" type="text" data-error-empty="is required" data-error-invalid="is invalid">
                                            <label class="control-label" for="last-name">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <input id="phone" name="phone" class="form-control requiredField" type="tel" data-error-empty="is required" data-error-invalid="is invalid - format: xxx-xxx-xxxx">
                                            <label class="control-label" for="phone">Phone</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <input id="address" name="address" class="form-control requiredField" type="text" data-error-empty="is required">
                                    <label class="control-label" for="address">Address Line 1</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input id="city" name="city" class="form-control requiredField" type="text" data-error-empty="is required">
                                            <label class="control-label" for="city">City</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="controls">
                                            <select id="province" class="form-control">
                                                <option>Alberta</option>
                                                <option>British Columbia</option>
                                                <option>Manitoba</option>
                                                <option>New Brunswick</option>
                                                <option>Newfoundland And Labrador</option>
                                                <option>Nova Scotia</option>
                                                <option>Ontario</option>
                                                <option>Prince Edward Island</option>
                                                <option>Quebec</option>
                                                <option>Saskatchewan</option>
                                                <option>Yukon</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input id="postal-code" name="postalCode" class="form-control requiredField" type="text" data-error-empty="is required" data-error-invalid="is invalid">
                                            <label class="control-label" for="postal-code">Postal Code</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="submit" type="submit" class="hidden">Send It</button>
                            <button id="submit" type="reset" class="hidden">Reset</button>
                        </form>
                    </div>
                    <div class="sub-total">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-9">
                                <button class="btn btn-default checkout pull-right margin-top-30">Checkout <i class="fa fa-long-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="thank-you hidden">
                    <div class="category">
                        <h2>Thank you for your order</h2> 
                    </div>
                    <div class="results shopping-cart">
                        <div class="row invoice-info">
                            <div class="col-xs-6">
                                <div class="tag-box">
                                    <h4>Biiling and Delivery Information:</h4>
                                    <ul class="list-unstyled">
                                        <li id="name"><strong>Name:</strong> </li>
                                        <li id="email"><strong>Email:</strong></li>
                                        <li id="phone"><strong>Phone:</strong></li>
                                        <li id="address"><strong>Address:</strong></li>
                                        <li id="del-date"><strong>Expected Delivery Date:</strong></li>
                                        <li id="city"><strong>City:</strong></li>
                                        <li id="province"><strong>Province:</strong></li>
                                        <li id="postal-code"><strong>Postal Code:</strong></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Invoice Details</h3> 
                            </div>
                            <table class="table table-striped invoice-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="price-table">
                                     <?php
                                        foreach($products as $product){
                                    ?>
                                    <tr>
                                        <td>1</td>
                                        <td><?php print HtmlSpecialChars($product->product); ?></td>
                                        <td><?php print $product->count; ?></td>
                                        <td>$ <?php print $product->price; ?></td>
                                        <td>$ <?php print $product->total; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="sub-total">
                            <div class="row">
                                <div class="col-sm-3 col-sm-offset-9">
                                    <ul class="list-inline total-result">
										<li>
											<h4>Subtotal:</h4>
											<div class="total-result-in">
												<span id="sub-total" data-total="<?php print $subTotal ?>" class="text-right">$ <?php print $subTotal ?></span>
											</div>
										</li>
										<li>
											<h4>Taxes:</h4>
											<div class="total-result-in">
												<span id="tax" class="text-right"></span>
											</div>
										</li>
                                        <li>
											<h4>Shipping:</h4>
											<div class="total-result-in">
												<span id="shipping" class="text-right"></span>
											</div>
										</li>
										<li class="divider"></li>
										<li class="total-price">
											<h4>Total:</h4>
											<div class="total-result-in">
												<span id="total" class="text-right"></span>
											</div>
										</li>
									</ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('../footer.php');
?>