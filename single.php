<?php
session_start();
require_once 'config/connect.php';
include 'inc/header.php';
include 'inc/nav.php';
if (isset($_GET['id'])  & !empty($_GET['id'])) {
    $id = $_GET['id'];
    $prodsql = "SELECT * FROM products WHERE id=$id";
    $prodres = mysqli_query($connection, $prodsql);
    $prodr = mysqli_fetch_assoc($prodres);
} else {
    header("location:index.php");
}


?>

<section class="single">
    <div class="container">
        <div class="row mb-5">
            <div class="page-header">
                <h2 class="d-block ">SHOP</h2>
                <h4>Eco Friendly!</h4>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-6">
                <img src=" admin/<?php echo $prodr['thumb'] ?>" class="img img-fluid mb-5" alt="">
            </div>
            <div class="col-md-6 text-left right-column align-middle">
                <h2 class="mb-3"><?php echo $prodr['name'] ?></h2>
                <div class="price mb-3">$<?php echo $prodr['price'] ?></div>
                <p class="description mb-3"><?php echo $prodr['description'] ?></p>
                <form method="get" action="addtocart.php">
                    <div class="product-quantity">

                        <span class="mr-1">QUANTITY:</span>
                        <input type="hidden" name="id" value="<?php echo $prodr['id']; ?>">
                        <input type="text" placeholder="1" name="quant">

                    </div>

                    <input type="submit" class="btn-outline-success btn-lg mt-4 mb-2 d-block" value="ADD TO CART">
                </form>
                <a class="d-block mb-3 linkicc" href="addtowishlist.php?id=<?php echo $prodr['id']; ?>">Add to Wishlist </a>

                <span>Category: <?php $prodcatsql = "SELECT * FROM category WHERE id={$prodr['catid']}";
                                $prodcatres = mysqli_query($connection, $prodcatsql);
                                $prodcatr = mysqli_fetch_assoc($prodcatres);
                                ?>
                    <a class="linkicc" href="index.php?id=<?php echo $prodcatr['id']; ?>"> <?php echo $prodcatr['name']; ?></a>
                </span>
            </div>

            <div class="col-md-12 ">
                <table class="table table-bordered mt-5 text-center">
                    <thead>
                        <tr>
                            <th scope="col" colspan="3" class="text-center">Overview</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td colspan="3"><?php echo $prodr['description']; ?></td>

                        </tr>

                        <tr>

                            <td colspan="3">Produced in: Nepal</td>

                        </tr>
                        <tr>


                            <td colspan="3">Material: Hemp,Textile,Cotton</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="col-md-12">
                <div class="h3 header-related my-5">Related Products</div>
                <div class="row d-flex justify-content-around ">

                    <?php
                    $relsql = "SELECT * FROM products WHERE id!=$id ORDER BY rand() LIMIT 3";
                    $relres = mysqli_query($connection, $relsql);
                    while ($relr = mysqli_fetch_assoc($relres)) { ?>
                        <div class="item">
                            <div class="product text-center">
                                <div class="product-thumb mb-2 " style="background-image: url('admin/<?php echo $relr['thumb'] ?>');       
                                                                    background-position: center;
                                                                    background-size: 100%;
                                                                    background-repeat: no-repeat;">

                                    <div class="product-overlay">
                                        <span>
                                            <a href="single.php?id=<?php echo $relr['id']; ?>" class="fas fa-info-circle"></a>
                                            <a href="addtocart.php?id=<?php echo $relr['id'] ?>" class="fa fa-shopping-cart"></a>
                                        </span>
                                    </div>
                                </div>
                                <h4 class="product-name"><?php echo $relr['name']; ?></h4>
                                <div class="product-price"><?php echo $relr['price']; ?>$</div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>






        </div>

    </div>
</section>



<?php include 'inc/footer.php'; ?>