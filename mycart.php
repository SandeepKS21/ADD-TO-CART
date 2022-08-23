<?php
include('header.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-5 border dounded bg-light">CART</h2>

        <div class="row">
            <div class="col-lg-8">
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th>Product Number</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php if (isset($_SESSION['cart'])) {

                            $no = 0;
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $no += 1;
                        ?>


                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $value['product_name']; ?></td>


                                    <?php echo "<td> $value[product_price] <input type='hidden' class='iprice' value='$value[product_price]'</td>" ?>


                                    <!-- update product quantity -->
                                    <form action="update_quantity.php" method="POST">

                                        <td><input type="number" name="mod_quantity" class="iquantity" onchange="this.form.submit()" value="<?php echo $value['quantity']; ?>" min='1' max='10'></td>

                                        <input type="hidden" name="product_name" value="<?php echo $value['product_name']; ?>">
                                        

                                    </form>
                                    <td class="itotal"></td>


                                    <!-- remove product button -->
                                    <form action="manage_cart.php" method="POST">

                                        <td><button name="remove_button" class="btn btn-danger">REMOVE</button>
                                        </td>

                                        <input type="hidden" name="product_name" value="<?php echo $value['product_name']; ?>">

                                        <input type="hidden" name="product_price" value="<?php echo $value['product_price']; ?>">
                                    </form>
                                </tr>
                        <?php
                            }
                        } ?>
                    </tbody>
                </table>
            </div>

            <?php if(isset($_SESSION['cart']))
            {
?>
          
            <div class="col-lg-4 mt-5">
                <div class="rounded border bg-light p-4">
                    <h4>Grand Total</h4>
                    <!-- here we have added grand total -->
                    <h5 class="text-right" id="gtotal"></h5>
                    <br>


                    <!-- make purchase part -->
                    <form action="" method="POST">

                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>

                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>

                            <label for="" class="form-label">Address</label>
                            <textarea name="address" id="" cols="40" rows="4" required> </textarea>

                        </div>

                        <button class="btn btn-primary" name="purchase">Make Purchase</button>
                    </form>
                </div>


            </div>
            <?php
        } ?>
        </div>


    </div>



    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');


        function subTotal() {
            gt = 0;

            for (i = 0; i < iprice.length; i++) {
                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
                gt = gt + (iprice[i].value) * (iquantity[i].value);
            }

            gtotal.innerText = gt;

        }

        subTotal();
    </script>




</body>

</html>