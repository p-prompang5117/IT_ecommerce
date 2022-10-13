<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_POST['btn_register'])) {
  $email=$_POST['mail'];
  $name=$_POST['name'];
  $pwd=$_POST['pwd'];
  $check="SELECT * from users WHERE user_email='$name' OR user_name='$name'";
  $result=$mysqli->query($check);
  if($result === FALSE){
    die(mysql_error());
  }
  if (mysqli_num_rows($result)>=1) {
    $row = mysqli_fetch_array($result);
    if ($email==$row['user_email']) {
      echo '<script type="text/javascript">
               swal({
                   icon: "error",
                   text: "E-mailนี้ถูกใช้ไปแล้ว",
                   title: "ขออภัย",
                   buttons: {
                     ok: "ตกลง",
                   }
                 })
                 .then((value)=> {
                    window.history.back();
                 })
           </script>';
    }elseif ($name==$row['user_name']) {
      echo '<script type="text/javascript">
               swal({
                   icon: "error",
                   text: "ชื่อนี้ถูกใช้ไปแล้ว",
                   title: "ขออภัย",
                   buttons: {
                     ok: "ตกลง",
                   }
                 })
                 .then((value)=> {
                    window.history.back();
                 })
           </script>';
    }
}else {

          $sql="INSERT INTO users (user_email,user_pass,user_name) VALUES('$email','$pwd','$name')";
          $insert=($mysqli->query($sql));
          if ($insert) {
            echo '<script type="text/javascript">
                     swal({
                         icon: "success",
                         text: "สมัตรสำเร็๗",
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
                         text: "เกิดข้อผิดพลาด",
                         title: "ขออภัย",
                         buttons: {
                           ok: "ตกลง",
                         }
                       })
                       .then((value)=> {
                          window.history.back();
                       })
                 </script>';
          }
    }
}
 ?>
