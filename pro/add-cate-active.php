<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_POST['btn_add_cate'])) {
  $cate=$_POST['cate'];
  $sql="INSERT INTO category(category_name) VALUES('$cate')";
  $result=$mysqli->query($sql);
  if ($result) {
    echo '<script type="text/javascript">
             swal({
                 icon: "success",
                 text: "เพิ่มประเภทสำเร็จ",
                 title: "ยินดีด้วย",
                 buttons: {
                   ok: "ตกลง",
                 }
               })
               .then((value)=> {
                 window.location.href = "admin-category.php"
               })
    </script>';
  }
}
 ?>
