<?php
session_start();
require_once '../config/connect.php';
if (isset($_POST) & !empty($_POST)) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['email'] = $email;
        header("location:index.php");
    } else {
        $fsmg = "Invalid Login Data! Try Again!";
    }
}
?>

<?php include 'inc/header.php';?>

<section class="login">
    <div class="container">
            <div class="row mb-5">
                <div class="page-header">
                    <h2 class="d-block mt-5">LOGIN</h2>

                    <h4>Admin Login</h4>
                </div>
            </div>

            <div class="row">

                    <div class="col-md-6 offset-md-3  mb-5">
                    <?php if (isset($fsmg)) {?> <div class="alert alert-danger" role="alert">
                    <?php echo $fsmg; ?> </div> <?php }?>
                        <div class="form-wrapper">
                            <!-- <h5 class="text-center cust mb-4">I'm a Returning Customer</h5> -->
                            <form class="form-login p-5" method="post" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>E-mail Address</label>
                                            <input type="email" name="email"value="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" value="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-end">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-warning btn-md px-4 py-2 my-2">Login</button>
                                    </div>



                                </div>

                            </form>
                        </div>
                    </div>


            </div>
    </div>
</section>


<?php include 'inc/footer.php';?>