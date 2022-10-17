<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_POST['addsubmit'])) {
  $prodname=$_POST['prodname'];
  $qty=$_POST['qtydial'];
  $customer=$_SESSION['user_id'];
  $bid = $_POST['bid'] ;
    echo $bid ;
  $check="SELECT * FROM products WHERE products_name='$prodname'";
  $result=$mysqli->query($check);
  $row=mysqli_fetch_array($result);

  $pid = $row['products_id'];
  $productsname=$row['products_name'];
  $price=$row['products__price'];
  $totalprice=$qty*$price;
  $newqty = $row['products_quantity'] - $qty ;
  
  $update="UPDATE products SET products_quantity='$newqty' WHERE products_id='$pid'";
  $todb=$mysqli->query($update);
  if ($todb) {
    $insert_sql = "UPDATE bill 
                    SET bill_products_name = '$prodname',
                    bill_customer =  '$customer', bill_price = '$price', 
                    bill_result_price = '$totalprice', bill_product_qty = '$qty', 
                    bill_status = 'not paid',bill_timestamp = current_timestamp()
                    WHERE bill_id = '$bid';";

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
