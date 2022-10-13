<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_REQUEST['btn_change'])) {
  $name=$_REQUEST['name'];
  $pwd=$_REQUEST['pwd'];
  $id=$_REQUEST['id'];
  $oldname=$_SESSION['user_name'];
  $check="SELECT * FROM users WHERE user_name='$name'";
  $result=$mysqli->query($check);
  if (mysqli_num_rows($result)>=1) {
    echo '<script type="text/javascript">
             swal({
                 icon: "error",
                 text: "ขออภัย ชื่อนี้ซ้ำ",
                 title: "กรุณากรอกชื่ออื่น",
                 buttons: {
                   ok: "ตกลง",
                 }
               })
               .then((value)=> {
                 window.location.href = "change_name.php"
               })
         </script>';
  }else {
    $ckpass="SELECT * FROM users WHERE user_name='$oldname' && user_pass='$pwd'";
    $checkpwd=$mysqli->query($ckpass);
    if (mysqli_num_rows($checkpwd)>=1) {
      $sql="UPDATE users SET user_name='$name' WHERE user_id=$id";
      $result2=($mysqli->query($sql));
      if ($result2) {
        $_SESSION['user_name']=$name;
        echo '<script type="text/javascript">
                 swal({
                     icon: "success",
                     text: "ยินดีด้วย",
                     title: "เปลี่ยนแปลงข้อมูลสำเร็จ",
                     buttons: {
                       ok: "ตกลง",
                     }
                   })
                   .then((value)=> {
                     window.location.href = "change_name.php"
                   })
             </script>';
    }
    }else {
      echo '<script type="text/javascript">
               swal({
                   icon: "error",
                   text: "ขออภัย รหัสผ่านไม่ถูกต้อง",
                   title: "กรุณาลองอีกครั้ง",
                   buttons: {
                     ok: "ตกลง",
                   }
                 })
                 .then((value)=> {
                   window.location.href = "change_name.php"
                 })
           </script>';
    }

}
}
 ?>
