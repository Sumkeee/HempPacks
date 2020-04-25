<?php
session_start();
require_once '../config/connect.php';
if (!isset($_SESSION['email']) & empty($_SESSION['email'])) {
    header('location:login.php');
}
if (isset($_POST) & !empty($_POST)) {
    $name = mysqli_real_escape_string($connection, $_POST['productname']);
    $description = mysqli_real_escape_string($connection, $_POST['productdescription']);
    $category = mysqli_real_escape_string($connection, $_POST['productcategory']);
    $price = mysqli_real_escape_string($connection, $_POST['productprice']);

    if (isset($_FILES) & !empty($_FILES)) {
        $imgname = $_FILES['productimage']['name'];
        $size = $_FILES['productimage']['size'];
        $type = $_FILES['productimage']['type'];
        $tmp_name = $_FILES['productimage']['tmp_name'];

        $max_size = 2000000;
        $extension = substr($imgname, strpos($imgname, '.') + 1);

        if (isset($imgname) & !empty($imgname)) {
            if (($extension == 'jpg' || $extension == 'jpeg') & $type == 'image/jpeg' & $size < $max_size) {
                $location = "uploads/";
                if (move_uploaded_file($tmp_name, $location . $imgname)) {

                    // echo "Uploaded succesfully!";
                    $sql = "INSERT INTO products (name,description,catid,price,thumb) VALUES ('$name','$description','$category','$price','$location$imgname') ";
                    $res = mysqli_query($connection, $sql);
                    if ($res) {
                        // $smsg= "Product added";
                        header("location:products.php");
                    } else {
                        $fmsg = "Failed adding product";
                    }
                } else {
                    $fmsg = "Failed to upload image!";
                }
            } else {
                $fmsg = "Only JPG failes are allowed and less then 2MB !";
            }
        } else {
            $fmsg = "Please select your file!";
        }
    } else {
        $sql = "INSERT INTO products (name,description,catid,price) VALUES ('$name','$description','$category','$price') ";
        $res = mysqli_query($connection, $sql);
        if ($res) {
            header("location:products.php");
        } else {
            $fmsg = "Failed adding product";
        }
    }
}


?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>

<section id="content">
    <div class="content-blog">
        <div class="container">
            <?php if (isset($fmsg)) { ?>
                <div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?>
                </div> <?php } ?>
            <?php if (isset($smsg)) { ?>
                <div class="alert alert-success" role="alert"> <?php echo $smsg; ?>
                </div> <?php } ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Productname">Product Name</label>
                    <input type="text" name="productname" id="productname" placeholder="Product Name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="productdescription">Product Description</label>
                    <textarea name="productdescription" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="productcategory">Product Category</label>
                    <select class="form-control" id="productcategory" name="productcategory">
                        <option value="">------SELECT CATEGORY------</option>
                        <?php
                        $sql = "SELECT * FROM category";
                        $res = mysqli_query($connection, $sql);
                        while ($r = mysqli_fetch_assoc($res)) {
                        ?>
                            <option value="<?php echo $r['id']; ?>"><?php echo $r['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="productprice">Product Price</label>
                    <input type="text" name="productprice" id="productprice" placeholder="Product Price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="productimage" class="d-block">Product Image</label>
                    <input type="file" name="productimage" id="productimage" class="d-block">
                    <p class="help-block d-block"> Only jpg/png are allowed. </p>
                </div>

                <button type="submit" class="btn btn-warning">Submit</button>



            </form>
        </div>
    </div>

</section>







<?php include 'inc/footer.php'; ?>