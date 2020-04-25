<?php require_once 'config/connect.php';
session_start();
include 'inc/header.php';
include 'inc/nav.php';
$cart = $_SESSION['cart'];
?>



<section class="cart">
    <div class="container">
        <div class="row mb-5">
            <div class="page-header">
                <h2 class="d-block ">YOUR CART</h2>
                <h4>Buy From Nature!</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table cart-table table-bordered text-center mb-5">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //print_r($cart);
                        $total = 0;
                        foreach ($cart as $key => $value) {
                            //echo $key . " : " . $value['quantity'] ."<br>";
                            $cartsql = "SELECT * FROM products WHERE id=$key";
                            $cartres = mysqli_query($connection, $cartsql);
                            $cartr = mysqli_fetch_assoc($cartres);


                        ?>
                            <tr>
                                <td>
                                    <a class="remove" href="delcart.php?id=<?php echo $key; ?>"><i class="fa fa-times"></i></a>
                                </td>
                                <td>
                                    <a href="single.php?id=<?php echo $cartr['id']; ?>"><img src="admin/<?php echo $cartr['thumb']; ?>" alt="" width="90"></a>
                                </td>
                                <td>
                                    <a href="single.php?id=<?php echo $cartr['id']; ?>"><?php echo substr($cartr['name'], 0, 30); ?></a>
                                </td>
                                <td>
                                    <span class="amount">$<?php echo $cartr['price']; ?></span>
                                </td>
                                <td>
                                    <div class="quantity"><?php echo $value['quantity']; ?></div>
                                </td>
                                <td>
                                    <span class="amount">$<?php echo ($cartr['price'] * $value['quantity']); ?></span>
                                </td>
                            </tr>
                        <?php
                            $total = $total + ($cartr['price'] * $value['quantity']);
                        } ?>


                        <tr>
                            <td colspan="6" class="actions">

                                <!-- <button class="button btn-warning btn-lg btn-sm button-checkout" type="submit">Checkout</button> -->
                                <a class="button btn-warning btn-lg btn-sm button-checkout" href="checkout.php">Checkout</a>

                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="cart_totals">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-8 offset-md-2 ">
                                <h3>Cart Totals</h3>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">$ <?php echo $total; ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping and Handling</th>
                                            <td>
                                                Free Shipping
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">$ <?php echo $total; ?></span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>


<?php include 'inc/footer.php'; ?>