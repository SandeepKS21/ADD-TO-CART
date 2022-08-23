<?php

session_start();


$p_name = $_POST['product_name'];
$p_price = $_POST['product_price'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {

        
        if (isset($_SESSION['cart'])) {

            
            $myitems = array_column($_SESSION['cart'], 'product_name');

            if (in_array($_POST['product_name'], $myitems)) {
                echo "<script> alert('Item already added');
                window.location.href='index.php';
                </script>";
                die;
            }

            
            $count = count($_SESSION['cart']);
          
            $_SESSION['cart'][$count] = array('product_name' => $p_name, 'product_price' => $p_price, 'quantity' => 1);
            header('location:index.php');
        }

        
        else {
            $_SESSION['cart'][0] = array('product_name' => $p_name, 'product_price' => $p_price, 'quantity' => 1);
            echo "<script> alert('Item added');
            window.location.href='index.php';
            </script>";
        }
    }

    if(isset($_POST['remove_button']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {

            if($value['product_name']==$p_name)
            {
                unset($_SESSION['cart'][$key]);
                
                $_SESSION['cart']= array_values($_SESSION['cart']);
                header('location:mycart.php');
            }
        }
    }


}
