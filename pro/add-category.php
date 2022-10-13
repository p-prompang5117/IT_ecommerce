<?php

require_once 'navbar.php';
require_once 'connect.php';
if (isset($_SESSION['user_tier'])) {
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
               window.location.href = "isdex.php"
             })
       </script>';
}
 ?>
 <body style="background:#198754;">
   <div class="container bg-info">
     <form class=""  action="add-product-active.php" method="post" id="product" enctype="multipart/form-data">
       <div class="simple-login-container">
           <h2>Add-products</h2>
           <div class="row">
                 <div class="col-xs-12 col-sm-12 col-md-6">
                   <div class="form-group">
                       <label for="nameproduct">ชื่อสินค้า</label>
                     <input type="text" name="nameproduct"  id="nameproduct" class="form-control input-sm" placeholder="ชุดจากเรื่อง...." required>
                   </div>
                 </div>
                 <div class="col-xs-6 col-sm-6 col-md-6">
                   <div class="form-group">
                       <label for="price">ราคาสินค้า</label>
                     <input type="number" name="price" id="price" class="form-control input-sm" placeholder="ราคาสินค้า" required>
                   </div>
                 </div>
             </div>
           <div class="row">
                 <div class="col-xs-6 col-sm-6 col-md-6">
                   <div class="form-group">
                       <label for="quntity">จำนวน</label>
                     <input type="number" name="quntity" id="quntity" class="form-control input-sm" placeholder="Ex.12" required>
                   </div>
                 </div>
                 <div class="col-xs-6 col-sm-6 col-mb-6">

                     <label for="customFile">รูปสินค้า</label>
                   <div class="custom-file">
                     <input type="file" class="form-control input-sm custom-file-input" name="fileToUpload" id="customFile">
                     <label class="custom-file-label" for="customFile">เลือกรูปที่จะโชว์</label>
                   </div>
                 </div>
             </div>
             <div class="row">

             </div>
               <div class="row">
                     <div class="col-xs-6 col-sm-6 col-md-6">
                       <div class="form-group">
                        <label for="cate">Category:</label>
                            <select class="form-control" id="cate" name="cate">
                              <?php
                              $sql = ("SELECT * FROM category ORDER BY category_id ASC");
                              $result=$mysqli->query($sql);
                                while ($row = mysqli_fetch_array($result))
                                {
                                 ?>
                              <option value="<?php echo $row['category_name'] ; ?>"><?php echo $row['category_name'] ; ?></option>
                            <?php } ?>
                            </select>
                       </div>
                     </div>

                 </div>
           <div class="row">
               <div class="col-md-12 form-group">
                   <input type="submit" class="btn btn-success" name="btn_input"  value="ตกลง">
               </div>
           </div>
       </div>
     </form>
   </div>
 </body>
