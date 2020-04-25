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

<!-- SHOP CONTENT -->
<section id="content">
    <div class="content-blog content-account">
        <div class="container">
            <div class="row">
                <div class="page-header text-center">
                    <h2 class="mb-3">MY ACCOUNT</h2>
                </div>
                <div class="col-md-12 table-responsive">
                    <h4>Order Number <?php if (isset($_GET['id']) & !empty($_GET['id'])) {
                                            $oid = $_GET['id'];
                                            echo $oid;
                                        } ?></h4>

                    <table class="cart-table account-table table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th></th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (isset($_GET['id']) & !empty($_GET['id'])) {
                                $oid = $_GET['id'];
                            } else {
                                header("location:my-account.php");
                            }
                            $ordsql = "SELECT * FROM orders WHERE uid='$uid' AND id='$oid'";
                            $ordres = mysqli_query($connection, $ordsql);
                            $ordr = mysqli_fetch_assoc($ordres);

                            $orditmsql = "SELECT * FROM orderitems o JOIN products p WHERE o.orderid=$oid AND o.pid=p.id";
                            $orditmres = mysqli_query($connection, $orditmsql);
                            while ($orditmr = mysqli_fetch_assoc($orditmres)) {
                            ?>
                                <tr>
                                    <td>
                                        <a href="single.php?id=<?php echo $orditmr['pid']; ?>"><?php echo substr($orditmr['name'], 0, 25); ?></a>
                                    </td>
                                    <td>
                                        <?php echo $orditmr['pquantity']; ?>
                                    </td>
                                    <td>
                                        $<?php echo $orditmr['productprice']; ?>
                                    </td>
                                    <td></td>
                                    <td>
                                        $<?php echo $orditmr['productprice'] * $orditmr['pquantity']; ?>
                                    </td>


                                </tr>
                            <?php } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    Order Total
                                </td>
                                <td>
                                    $<?php echo $ordr['totalprice']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    Order Status
                                </td>
                                <td>
                                    <?php echo $ordr['orderstatus']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    Order Placed On
                                </td>
                                <td>
                                    <?php echo $ordr['timestamp']; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>