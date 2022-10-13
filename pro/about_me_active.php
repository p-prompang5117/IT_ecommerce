<?php
require_once 'navbar.php';
require_once 'connect.php';
$tier=$_SESSION['user_tier'];
$problem=FALSE;
    $myid=$_REQUEST['myid'];
    $email=$_REQUEST['mail'];
    $name=$_REQUEST['name'];
    $oldpwd=$_REQUEST['oldpwd'];
    $newpwd=$_REQUEST['newpwd'];
    $check="SELECT * FROM users";
    $result=$mysqli->query($check);
    foreach( $result as $row ){
      if ($row['user_name']==$name && $row['user_id']!=$myid) {
        $problem=TRUE;
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
                     window.location.href = "about_me.php"
                   })
             </script>';
      }elseif ($row['user_email']==$email && $row['user_id']!=$myid) {
        $problem=TRUE;
        echo '<script type="text/javascript">
                 swal({
                     icon: "error",
                     text: "ขออภัย E-mailนี้ซ้ำ",
                     title: "กรุณากรอก E-mail อื่น",
                     buttons: {
                       ok: "ตกลง",
                     }
                   })
                   .then((value)=> {
                     window.location.href = "about_me.php"
                   })
             </script>';
      }elseif($row['user_pass']!=$oldpwd && $row['user_id']==$myid) {
        $problem=TRUE;
        echo '<script type="text/javascript">
                 swal({
                     icon: "error",
                     text: " รหัสเก่าไม่ถูกต้อง",
                     title: "ขออภัย",
                     buttons: {
                       ok: "ตกลง",
                     }
                   })
                   .then((value)=> {
                     window.location.href = "about_me.php"
                   })
             </script>';
      }
    }
    if ($problem==FALSE) {
      $sql="UPDATE users SET
      user_email='$email',
      user_name='$name',
      user_pass='$newpwd' WHERE user_id=$myid";
      $result=($mysqli->query($sql));
      if ($result) {
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
                     window.location.href = "about_me.php"
                   })
             </script>';
      }
    }

?>
