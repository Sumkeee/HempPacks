<?php
session_start();
require_once 'config/connect.php';
include 'inc/header.php';
include 'inc/nav.php'; ?>

<section class="login">
    <div class="container">
        <div class="row mb-5">
            <div class="page-header">
                <h2 class="d-block ">YOUR ACCOUNT</h2>
                <h4>Sign in or Register</h4>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6  p-4 mb-5">
                <div class="form-wrapper">
                    <h5 class="text-center cust mb-4">I'm a Returning Customer</h5>
                    <?php if (isset($_GET['message'])) {
                        if ($_GET['message'] == 1) {
                    ?><div class="alert alert-danger" role="alert"> <?php echo "Invalid Email or Password! Try Again!"; ?> </div>

                    <?php }
                    } ?>
                    <form class="form-login p-5" method="post" action="loginprocess.php">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>E-mail Address</label>
                                    <input type="email" name="email" value="" class="form-control">
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
            <div class="col-md-6 p-4 mb-5">
                <div class="form-wrapper">
                    <h5 class="text-center cust mb-4">Register New Account</h5>
                    <?php if (isset($_GET['message'])) {
                        if ($_GET['message'] == 2) {
                    ?><div class="alert alert-danger" role="alert"> <?php echo "Failed to Register!"; ?> </div>
                    <?php }
                    } ?>
                    <form class="form-login p-5" method="post" action="registerprocess.php">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>E-mail Address</label>
                                    <input type="email" name="email" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Re-Enter Password</label>
                                    <input type="password" name="passwordagain" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning btn-md px-4 py-2 my-2">Register</button>
                            </div>



                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>


<?php include 'inc/footer.php'; ?>