<?php
include('header.php');
?>

<?php $con = mysqli_connect("localhost", "root", "", "shop");

$sel = "SELECT * FROM add_product";
$rs = $con->query($sel);

$data = array();
while ($row = $rs->fetch_assoc()) {
    $data[] = $row;
}

?>
<div class="container">
    <div class="row">
        <?php foreach ($data as $list) {
        ?>
            <div class="col-md-4">
                <form action="manage_cart.php" method="POST">
                    <div class="card" style="width:270px">
                        <img class="image" src="/shop/product_img/<?php echo $list['product_image']; ?>" alt="Card image" style="width:100%">
                        <div class="card-body">


                            <h4 class="card-title"><?php echo $list['product_name']; ?></h4>
                            <p class="card-text"><?php echo $list['product_price'] ?></p>
                            <button type="submit" name="add_to_cart" class="btn btn-info">Add to cart</button>



                            <input type="hidden" name="product_name" value="<?php echo $list['product_name']; ?>">

                            <input type="hidden" name="product_price" value="<?php echo $list['product_price']; ?>">
                        </div>
                    </div>
                </form>
            </div>
        <?php
        } ?>
    </div>
    
</div>