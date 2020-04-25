<?php
ob_start();
session_start();
require_once '../config/connect.php';
if (!isset($_SESSION['email']) & empty($_SESSION['email'])) {
    header('location:login.php');
}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
<?php

if (isset($_POST) & !empty($_POST)) {

    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
    $id = filter_var($_POST['orderid'], FILTER_SANITIZE_NUMBER_INT);

    echo $ordprcsql = "INSERT INTO ordertracking (orderid, status, message) VALUES ('$id','$status','$message')";

    $ordprcres = mysqli_query($connection, $ordprcsql) or die(mysqli_error($connection));
    if ($ordprcres) {
        $ordupd = "UPDATE orders SET orderstatus = '$status' WHERE id=$id";
        if (mysqli_query($connection, $ordupd)) {
            header('location:orders.php');
        }
    }
}

?>


<!-- SHOP CONTENT -->
<section id="content">
    <div class="content-blog">
        <div class="page_header text-center">
            <h2 class="mb-4">ADMIN - ORDER PROCESSING</h2>

        </div>
        <form method="post">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="billing-details table-responsive">

                            <table class="cart-table account-table table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Payment Mode</th>
                                        <th>Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_GET['id']) & !empty($_GET['id'])) {
                                        $oid = $_GET['id'];
                                    } else {
                                        header('location:orders.php');
                                    }
                                    $ordsql = "SELECT * FROM orders WHERE id=$oid";
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
                                                $<?php echo $ordr['totalprice']; ?>.00
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>


                            <label class="mt-2">Select Status</label>

                            <select class="form-control" name="status">
                                <option value="">Select Status</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Dispatched">Dispatched</option>
                                <option value="Delivered">Delivered</option>
                            </select>


                            <label class="mt-4">Message : </label>
                            <textarea class="form-control" name="message" cols="10"></textarea>

                            <input type="hidden" name="orderid" value="<?php echo $_GET['id']; ?>">

                            <input type="submit" style="margin:0 auto;" class="button btn-success btn-lg btn-block mt-4" value="Update Order Status ">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include 'inc/footer.php'; ?>