<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_SESSION['user_id'])) {
  $pid=$_SESSION['products_id'];
  $qty=$_SESSION['quantity'];
  $customer=$_SESSION['user_id'];
  $check="SELECT * FROM products WHERE products_id=$pid";
  $result=$mysqli->query($check);
  $row=mysqli_fetch_array($result);
  $productsname=$row['products_name'];
  $price=$row['products__price'];
  $totalprice=$qty*$price;
  $newqty=$row['products_quantity']-$qty;
  $update="UPDATE products SET products_quantity='$newqty' WHERE products_id='$pid'";
  $todb=$mysqli->query($update);
  if ($todb) {
    $insert_sql="INSERT INTO bill (bill_products_name,bill_customer,bill_price,bill_result_price,bill_product_qty) VALUES('$productsname','$customer',$price,$totalprice,$qty)";
    $insertbill=$mysqli->query($insert_sql);
    if ($insertbill) {
   unset($_SESSION['products_id']);
   unset($_SESSION['quantity']);
      echo '<script type="text/javascript">
               swal({
                   icon: "success",
                   text: "ซื้อสินค้าสำเร็จ",
                   title: "ยินดีด้วย",
                   buttons: {
                     ok: "ตกลง",
                   }
                 })
                 .then((value)=> {
                   window.location.href = "isdex.php"
                 })
           </script>';
    }else {
      echo '<script type="text/javascript">
               swal({
                   icon: "error",
                   text: "ซื้อสินค้าไม่สำเร็จ",
                   title: "ขออภัย",
                   buttons: {
                     ok: "ตกลง",
                   }
                 })
                 .then((value)=> {
                   window.location.href = "isdex.php"
                 })
           </script>';
    }
  }
}
 ?>
