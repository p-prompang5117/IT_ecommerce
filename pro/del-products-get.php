<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_SESSION['user_tier'])) {
      $id=$_GET['id'];
      $sql="DELETE FROM bill WHERE bill_id='$id'";
      $result=$mysqli->query($sql);
      if($result === FALSE){
        die(mysql_error());
      }
      if ($result) {
        echo '<script type="text/javascript">
                 swal({
                     icon: "success",
                     text: "ลบสินค้าชิ้นนี้สำเร็จ",
                     title: "ยินดีด้วย",
                     buttons: {
                       ok: "ตกลง",
                     }
                   })
                   .then((value)=> {
                     window.location.href = "addcart.php"
                   })
        </script>';
      }else {
        echo '<script type="text/javascript">
                 swal({
                     icon: "error",
                     text: "เกิดข้อผิดพลาด ลบไม่สำเร็จ",
                     title: "ขออภัย",
                     buttons: {
                       ok: "ตกลง",
                     }
                   })
                   .then((value)=> {
                     window.location.href = "admin-product.php"
                   })
        </script>';
      }
  }elseif(!isset($_SESSION['user_id'])) {
  echo '<script type="text/javascript">
           swal({
               icon: "error",
               text: "กรุณา Login ก่อน",
               title: "ขออภัย",
               buttons: {
                 ok: "ตกลง",
               }
             })
             .then((value)=> {
               window.location.href = "index.php"
             })
       </script>';
}

 ?>
