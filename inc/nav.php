<nav class="navbar navbar-expand-md navbar-dark py-4 mt-5" id="main-nav"">
    
  <button  class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
  <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="indexx.php">Home</a>

      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
          Shop
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
          $catsql = "SELECT * FROM category";
          $catres = mysqli_query($connection, $catsql);
          while ($catr = mysqli_fetch_assoc($catres)) {
          ?>
            <a class="dropdown-item p-3" href="indexx.php?id=<?php echo $catr['id']; ?>"><?php echo $catr['name']; ?></a>

          <?php } ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
          My Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item p-3" href="my-account.php">My Orders</a>

          <a class="dropdown-item p-3" href="edit-address.php">Update Adress</a>

          <a class="dropdown-item p-3" href="wishlist.php">Wishlist</a>

          <a class="dropdown-item p-3" href="logout.php">Logout</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>

    </ul>

  </div>

  <?php if (isset($_SESSION['cart'])) { ?>
    <?php $cart = $_SESSION['cart']; ?>
    <div class="dropdown cart-button ">
      <button class="btn btn-success dropdown-toggle cart-button-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-shopping-cart"></i> <em><?php
                                                  echo count($cart); ?></em>
      </button>
      <div class="dropdown-menu dropdown-menu-right cart-dropdown-menu " aria-labelledby="dropdownMenuButton">
        <p class="text-dark text-center">You have <?php echo count($cart); ?> items in your shopping bag</p>
        <div class="container">

          <?php
          //print_r($cart);
          $total = 0;
          foreach ($cart as $key => $value) {
            //echo $key . " : " . $value['quantity'] ."<br>";
            $navcartsql = "SELECT * FROM products WHERE id=$key";
            $navcartres = mysqli_query($connection, $navcartsql);
            $navcartr = mysqli_fetch_assoc($navcartres);
          ?>

            <div class="row py-3">
              <div class="col-md-5">
                <img src="admin/<?php echo $navcartr['thumb']; ?>" alt="" class="img img-fluid align-self-middle">
              </div>
              <div class="col-md-7 text-left d-flex flex-column align-items-start ">
                <h5 class="text-dark align-self-baseline"><a href="single.php?id=<?php echo $navcartr['id']; ?>"><?php echo substr($navcartr['name'], 0, 30); ?></a></h5>
                <p><?php echo $value['quantity']; ?> x $<?php echo $navcartr['price']; ?></p>
                <div class="ci-edit mt-auto">
                  <a href="delcart.php?id=<?php echo $key; ?>"><i class="fa fa-trash " aria-hidden="true"></i></a>
                </div>
              </div>
            </div>

          <?php
            $total = $total + ($navcartr['price'] * $value['quantity']);
          } ?>





          <p class="d-block " id="Subtotal">Subtotal: $<?php echo $total; ?></p>


          <div class="btn-group d-block">
            <a class="btn btn-dark btn-sm " href="cart.php">VIEW CART</a>
            <a class="btn btn-warning btn-sm" href="checkout.php">CHECKOUT</a>
          </div>

        </div>

      </div>
    </div>

  <?php } ?>
</nav>