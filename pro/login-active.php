<?php
require_once 'navbar.php';
require_once 'connect.php';
$username = $_POST["username"];//เก็บคemailจากฟอร์มล็อกอิน
$password = $_POST["pwd"];//เก็บpasswordจากฟอร์ม

$result = $mysqli->query("SELECT * from users WHERE user_email='$username'&& user_pass='$password'");//เช็คค่าหาอีเมลและพาสที่ตรงกัน
if($result === FALSE){
  die(mysql_error());
}
if(mysqli_num_rows($result)==1){
      $row = mysqli_fetch_array($result);
      $_SESSION['user_name'] = $row['user_name'];
      $_SESSION['user_tier'] = $row['user_tier'];
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['user_email'] = $row['user_email'];
      echo '<script type="text/javascript">
               swal({
                   icon: "success",
                   text: "Login สำเร็จ",
                   title: "ขอบคุณ",
                   buttons: {
                     ok: "ตกลง",
                   }
                 })
                 .then((value)=> {
                   window.location.href = "isdex.php"
                 })
           </script>';
    } else {
      echo '<script type="text/javascript">
               swal({
                   icon: "error",
                   text: "รหัสผ่าน หรือ อีเมลล์ ผิดพลาด",
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
 ?>
