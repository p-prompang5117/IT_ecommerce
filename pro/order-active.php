<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_SESSION['user_id'])) {
  $id=$_SESSION['products_id'];
  $oparator=$_GET['oparator'];
  if ($oparator=='plus') {
    $check="SELECT products_quantity FROM products WHERE products_id=$id";
    $result=$mysqli->query($check);
    $row=mysqli_fetch_array($result);
      if ($_SESSION['quantity'] >= $row['products_quantity']) {
        echo '<script type="text/javascript">
                 swal({
                     icon: "error",
                     text: "สินค้าไม่พอ",
                     title: "ขออภัย",
                     buttons: {
                       ok: "ตกลง",
                     }
                   })
                   .then((value)=> {
                     window.location.href = "order.php"
                   })
             </script>';
      }elseif($_SESSION['quantity'] <= $row['products_quantity']) {
        $_SESSION['quantity']++;
        echo '<script type="text/javascript">
                 swal({
                     icon: "success",
                     text: "เพิ่มจำนวนสินค้าสำเร็จ",
                     title: "ยินดีด้วย",
                     buttons: {
                       ok: "ตกลง",
                     }
                   })
                   .then((value)=> {
                     window.location.href = "order.php"
                   })
             </script>';
      }

  }elseif ($oparator=='minus') {
    if ($_SESSION['quantity'] > 1) {
      $_SESSION['quantity']--;
      echo '<script type="text/javascript">
               swal({
                   icon: "success",
                   text: "ลดจำนวนสินค้าสำเร็จ",
                   title: "ยินดีด้วย",
                   buttons: {
                     ok: "ตกลง",
                   }
                 })
                 .then((value)=> {
                   window.location.href = "order.php"
                 })
           </script>';
    }
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
               window.location.href = "isdex.php"
             })
       </script>';
}
 ?>
<body style="background:#198754;">

</body>
