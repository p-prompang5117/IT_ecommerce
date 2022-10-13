<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_POST['btn_input'])) {
    $nameproduct=$_POST['nameproduct'];
    $price=$_POST['price'];
    $quntity=$_POST['quntity'];
    $cate=$_POST['cate'];
    $file=basename($_FILES["fileToUpload"]["name"]);
    if ($file != "") {
      $uploadOk = 1;
      $target_dir = "img/";;
      //set date
      date_default_timezone_set('Asia/Bangkok');
      $date = date("Y-m-d-");
      //random number
      $numrand = (mt_rand());
      $file=basename($_FILES["fileToUpload"]["name"]);
      $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
      $newname=$date.$numrand.".".$imageFileType;
      $target_file = $target_dir . $newname;
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          $uploadOk = 0;
          $t="filetype";
        }

      // Check if file already exists
      if (file_exists($target_file)) {
        $uploadOk = 0;
        $t="same name";
      }

      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 1000000) {
        $uploadOk = 0;
        $t="size";
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        $uploadOk = 0;
        $t="lastname";
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
      if ($t=="lastname") {
        echo '<script type="text/javascript">
                 swal({
                     icon: "error",
                     text: "ไฟล์ไม่ถูกอัพโหลด(นามสกุลไฟล์ไม่ถูกต้อง)",
                     title: "ขออภัย",
                     buttons: {
                       ok: "ตกลง",
                     }
                   })
                   .then((value)=> {
                      window.history.back();
                   })
             </script>';
      }elseif ($t=="size") {
        echo '<script type="text/javascript">
                 swal({
                     icon: "error",
                     text: "ไฟล์ไม่ถูกอัพโหลด(ขนาดไฟล์มากเกินไป)",
                     title: "ขออภัย",
                     buttons: {
                       ok: "ตกลง",
                     }
                   })
                   .then((value)=> {
                      window.history.back();
                   })
             </script>';
      }elseif ($t=="same name") {
          echo '<script type="text/javascript">
                   swal({
                       icon: "error",
                       text: "ไฟล์ไม่ถูกอัพโหลด(ชื่อไฟล์ซ้ำกรุณาอัพโหลดใหม่)",
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
      // if everything is ok, try to upload file
      }else {
          $select_sql =("SELECT products_name FROM products WHERE products_name='$nameproduct'");
          $result=$mysqli->query($select_sql);
          $row =mysqli_fetch_array($result);
          if (isset($row['products_name'])) {
            echo '<script type="text/javascript">
                     swal({
                         icon: "error",
                         text: "ชื่อสินค้านี้ถูกใช้ไปแล้ว",
                         title: "ขออภัย",
                         buttons: {
                           ok: "ตกลง",
                         }
                       })
                       .then((value)=> {
                          window.history.back();
                       })
                 </script>';
          }else {
              $sql="INSERT INTO products(products_name,products__price,products_quantity,products_img,products_category) VALUES('$nameproduct',$price,$quntity,'$target_file','$cate')";
              $result=$mysqli->query($sql);
              if ($result) {
                if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
                {  echo '<script type="text/javascript">
                           swal({
                               icon: "success",
                               text: "อัพโหลดสินค้าเสร็จสิ้น",
                               title: "ยินดีด้วย",
                               buttons: {
                                 ok: "ตกลง",
                               }
                             })
                             .then((value)=> {
                               window.location.href = "admin-product.php"
                             })
                       </script>';
                     }
              }
          }

      }
  }
}else {
  echo '<script type="text/javascript">
           swal({
               icon: "error",
               text: "เกิดเหตุขัดข้องบางประการ",
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
