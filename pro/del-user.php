<?php
require_once 'navbar.php';
require_once 'connect.php';

$id=$_REQUEST['user_id'];
$sql="DELETE FROM users WHERE user_id='$id'";
$result=$mysqli->query($sql);
if ($result) {
  echo '<script type="text/javascript">
           swal({
               icon: "success",
               text: "ลบผู้ใช้งานนี้สำเร็จ",
               title: "ยินดีด้วย",
               buttons: {
                 ok: "ตกลง",
               }
             })
             .then((value)=> {
               window.location.href = "admin-user.php"
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
               window.location.href = "admin-user.php"
             })
  </script>';
}
 ?>
