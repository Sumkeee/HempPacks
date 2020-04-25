<?php
session_start();
require_once '../config/connect.php';
if (!isset($_SESSION['email']) & empty($_SESSION['email'])) {
    header('location:login.php');
}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>

<section class="content">
    <div class="container" id="content-container">
        <div class="row mb-5">
            <div class="page-header">
                <h2 class="d-block ">HEMP PACKS - ADMIN</h2>
                <h4 class="mb-3">Dashboard</h4>
            </div>
        </div>
        <div class="row d-flex justify-content-between text-center" id="content-row-admin">

            <div class="item-wrapper">
                <div class="item">
                    <div class="product text-center">
                        <div class="product-thumb-admin mb-2">
                            <img src="img/categoryy.png" alt="" class="img img-fluid">
                            <div class="product-overlay-admin text-center">
                                <div class="icon-holder">
                                    <div class="admin-icons py-2 my-2">
                                        <a href="categories.php">View Categories</a>
                                    </div>
                                    <div class="admin-icons py-2 my-2">
                                        <a href="addcategory.php">Add Category</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="product-name">Categories</h4>

                    </div>
                </div>
            </div>
            <div class="item-wrapper">
                <div class="item">
                    <div class="product text-center">
                        <div class="product-thumb-admin mb-2">
                            <img src="img/products.png" alt="" class="img img-fluid">
                            <div class="product-overlay-admin text-center">
                                <div class="icon-holder">
                                    <div class="admin-icons py-2 my-2">
                                        <a href="products.php">View Products</a>
                                    </div>
                                    <div class="admin-icons py-2 my-2">
                                        <a href="addproduct.php">Add Product</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="product-name">Products</h4>

                    </div>
                </div>
            </div>
            <div class="item-wrapper">
                <div class="item">
                    <div class="product text-center">
                        <div class="product-thumb-admin mb-2">
                            <img src="img/orders.png" alt="" class="img img-fluid">
                            <div class="product-overlay-admin text-center">
                                <div class="icon-holder-2">
                                    <div class="admin-icons py-2 my-2">
                                        <a href="orders.php">View Orders</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="product-name">Orders</h4>

                    </div>
                </div>
            </div>
            <div class="item-wrapper">
                <div class="item">
                    <div class="product text-center">
                        <div class="product-thumb-admin mb-2">
                            <img src="img/my.png" alt="" class="img img-fluid">
                            <div class="product-overlay-admin text-center">
                                <div class="icon-holder-2">
                                    <div class="admin-icons py-2 my-2">
                                        <a href="logout.php">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="product-name">My Account</h4>

                    </div>
                </div>
            </div>






        </div>
    </div>
</section>


<?php include 'inc/footer.php'; ?>