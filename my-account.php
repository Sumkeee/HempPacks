<?php
ob_start();
session_start();
require_once 'config/connect.php';
if (!isset($_SESSION['customer']) & empty($_SESSION['customer'])) {
    header('location:login.php');
}
include 'inc/header.php';
include 'inc/nav.php';
$uid = $_SESSION['customerid'];
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}


?>



<section class="my-account">
    <div class="page-header mb-5">
        <h2 class="d-block ">MY ACCOUNT</h2>
        <h4>See Your Details!</h4>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-3">Recent Orders</h3>
                <div class="table-responsive">
                    <table class="cart-table account-table table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ordsql = "SELECT * FROM orders WHERE uid='$uid'";
                            $ordres = mysqli_query($connection, $ordsql);
                            while ($ordr = mysqli_fetch_assoc($ordres)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $ordr['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $ordr['timestamp']; ?>
                                    </td>
                                    <td>
                                        <?php echo $ordr['orderstatus']; ?>
                                    </td>
                                    <td>
                                        <?php echo $ordr['paymentmode']; ?>
                                    </td>
                                    <td>
                                        $<?php echo $ordr['totalprice']; ?>
                                    </td>
                                    <td>
                                        <a href="view-order.php?id=<?php echo $ordr['id']; ?>">View</a>
                                        <?php if ($ordr['orderstatus'] != 'Cancelled') { ?>
                                            | <a class="cancelbutton" href="cancel-order.php?id=<?php echo $ordr['id']; ?>">Cancel</a>
                                        <?php } ?>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="my-adressess ">
                    <h4>My Address</h4>
                    <p>The following addresses will be used on the checkout page by default!</p>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="pb-2">Shipping Address <a href="edit-address.php">Edit Info</a></h5>
                            <?php
                            $csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.mobile, u1.zip FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
                            $cres = mysqli_query($connection, $csql);
                            if (mysqli_num_rows($cres) == 1) {
                                $cr = mysqli_fetch_assoc($cres);
                                echo "<p>" . $cr['firstname'] . " " . $cr['lastname'] . "</p>";
                                echo "<p>" . $cr['address1'] . "</p>";
                                echo "<p>" . $cr['address2'] . "</p>";
                                echo "<p>" . $cr['city'] . "</p>";
                                echo "<p>" . $cr['state'] . "</p>";
                                echo "<p>" . $cr['country'] . "</p>";
                                echo "<p>" . $cr['company'] . "</p>";
                                echo "<p>" . $cr['zip'] . "</p>";
                                echo "<p>" . $cr['mobile'] . "</p>";
                                echo "<p>" . $cr['email'] . "</p>";
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
</section>



<?php include 'inc/footer.php'; ?>