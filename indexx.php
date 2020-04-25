<?php
session_start();
require_once 'config/connect.php';
include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>

<section class="content">
    <div class="container" id="content-container">
        <div class="row mb-5">
            <div class="page-header">
                <h2 class="d-block ">HEMP PACKS SHOP</h2>
                <h4>Eco Friendly!</h4>
            </div>
        </div>
        <div class="row d-flex justify-content-between " id="content-row">


            <?php
            if (isset($_GET['id']) & !empty($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM products WHERE catid=$id ORDER BY RAND()";

                $res = mysqli_query($connection, $sql);
                while ($r = mysqli_fetch_assoc($res)) { ?>


                    <div class="item">
                        <div class="product text-center">
                            <div class="product-thumb mb-2 " style="background-image: url('admin/<?php echo $r['thumb'] ?>');       
                                                                background-position: center;
                                                                background-size: 100%;
                                                                background-repeat: no-repeat;">

                                <div class="product-overlay">
                                    <span>
                                        <a href="single.php?id=<?php echo $r['id']; ?>" class="fas fa-info-circle"></a>
                                        <a href="addtocart.php?id=<?php echo $r['id']; ?>" class="fa fa-shopping-cart"></a>
                                    </span>
                                </div>
                            </div>
                            <h4 class="product-name"><?php echo $r['name']; ?></h4>
                            <div class="product-price"><?php echo $r['price']; ?>$</div>
                        </div>
                    </div>

                <?php }
            } else {



                $sql = "SELECT * FROM products ORDER BY RAND()";

                ?>
                <?php $res = mysqli_query($connection, $sql);
                while ($r = mysqli_fetch_assoc($res)) { ?>
                    <div class="item">
                        <div class="product text-center">
                            <div class="product-thumb mb-2 " style="background-image: url('admin/<?php echo $r['thumb'] ?>');       
                                                                background-position: center;
                                                                background-size: 100%;
                                                                background-repeat: no-repeat;">

                                <div class="product-overlay">
                                    <span>
                                        <a href="single.php?id=<?php echo $r['id']; ?>" class=" fas fa-info-circle"></a>
                                        <a href="addtocart.php?id=<?php echo $r['id']; ?>" class="fa fa-shopping-cart"></a>
                                    </span>
                                </div>
                            </div>
                            <h4 class="product-name"><?php echo $r['name']; ?></h4>
                            <div class="product-price">$<?php echo $r['price']; ?></div>
                        </div>
                    </div>

            <?php }
            } ?>









        </div>
    </div>
</section>

<nav aria-label="Page navigation example " class="pagination-navigationn">
    <ul class="pagination justify-content-center">
        <li id="previous-page" class="page-item"><a class="page-link" href="#">Previous</a></li>
    </ul>
</nav>



<?php include 'inc/footer.php'; ?>