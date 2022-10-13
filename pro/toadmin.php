<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_SESSION['user_name'])) {
  if ($_SESSION['user_tier']!=0) {
    echo '<script type="text/javascript">
             swal({
                 icon: "error",
                 text: "หน้านี้เข้าได้เฉพาะ Admin",
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
}else {
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
$id=$_GET['user_id'];
$sql="UPDATE users SET user_tier=0 WHERE user_id=$id";
$result=$mysqli->query($sql);
if ($result) {
  echo '<script type="text/javascript">
           swal({
               icon: "success",
               text: "อัพเกรด ผู้ใช้เป็นแอดมินเรียบร้อย",
               title: "สำเร็จ!",
               buttons: {
                 ok: "ตกลง",
               }
             })
             .then((value)=> {
               window.location.href = "admin-user.php"
             })
       </script>';
}
 ?>
