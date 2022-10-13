<?php
require_once 'navbar.php';
require_once 'connect.php';
if ($id=$_GET['id']) {
  if ($_SESSION['products_id']=$id) {
    $_SESSION['quantity']=1;
    echo '<script type="text/javascript">
             swal({
                 icon: "success",
                 text: "เปลี่ยนสินค้าสำเร็จ",
                 title: "ยินดีด้วย",
                 buttons: {
                   ok: "ตกลง",
                 }
               })
               .then((value)=> {
                 window.location.href = "order.php"
               })
         </script>';
  }else {
    echo '<script type="text/javascript">
             swal({
                 icon: "error",
                 text: "เกิดข้อผิดพลาดขึ้น",
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
}else {
  echo '<script type="text/javascript">
           swal({
               icon: "error",
               text: "เกิดข้อผิดพลาดขึ้น",
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
