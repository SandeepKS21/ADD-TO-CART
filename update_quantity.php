<?php
session_start();
$p_name=$_POST['product_name'];

if(isset($_POST['mod_quantity']))
{
    if(isset($_SESSION['cart']))
    {
        foreach($_SESSION['cart'] as $key=>$value)
        {
            if($value['product_name']==$p_name)
            {
                $_SESSION['cart'][$key]['quantity']=$_POST['mod_quantity'];
                header('location:mycart.php');
            }
        }
    }
}

?>