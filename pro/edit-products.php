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
               window.location.href = "index.php"
             })
       </script>';
}
$id=$_GET['id'];
$edit = ("SELECT * FROM products WHERE products_id='$id'");
$result_pro=$mysqli->query($edit);
$row = mysqli_fetch_array($result_pro);
 ?>
 <style media="screen">
 body{
   background-image: url("img/bg1.png");
 }
 </style>
<body>
  <div class="container bg-secondary text-white">
    <form class=""  action="edit-product-active.php?id=<?php echo $row['products_id']; ?>" method="post" id="product" enctype="multipart/form-data">
      <div class="simple-login-container">
          <h2>Add-products</h2>
          <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <div class="form-group">
                      <label for="nameproduct">ชื่อสินค้า</label>
                    <input type="text" name="nameproduct" value="<?php echo $row['products_name']; ?>"  id="nameproduct" class="form-control input-sm" placeholder="ชุดจากเรื่อง...." required>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="price">ราคาสินค้า</label>
                    <input type="number" name="price" value="<?php echo $row['products__price']; ?>" id="price" class="form-control input-sm" placeholder="ราคาสินค้า" required>
                  </div>
                </div>
            </div>
          <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="quntity">จำนวน</label>
                    <input type="number" name="quntity" value="<?php echo $row['products_quantity']; ?>" id="quntity" class="form-control input-sm" placeholder="Ex.12" required>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                   <label for="cate">Category:</label>
                       <select class="form-control" id="cate" name="cate">
                         <?php
                         $sql = ("SELECT * FROM category ORDER BY category_id ASC");
                         $result=$mysqli->query($sql);
                           while ($row2 = mysqli_fetch_array($result))
                           {
                            ?>
                         <option  value="<?php echo $row2['category_name'] ; ?>"
                           <?php if ($row['products_category']==$row2['category_name']) {
                             echo "selected";
                           } ?>
                           ><?php echo $row2['category_name'] ; ?></option>
                       <?php } ?>
                       </select>
                  </div>
                </div>
            </div>
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-mb-6">

                      <label for="customFile">รูปสินค้า</label>
                    <div class="custom-file">
                      <input type="file" class="form-control input-sm custom-file-input" name="fileToUpload" id="customFile">
                      <label class="custom-file-label" for="customFile">เลือกรูปที่จะโชว์</label>
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-mb-6">
                    <label for="old-img">รูปสินค้าเก่า</label>
                    <img class="img-thumbnail img-fluid" id="old-img" src="<?php echo $row['products_img']; ?>" alt="Responsive image" style="width: 250px; height: 250px; display: block;" >
                  </div>
                </div>
          <div class="row">
              <div class="col-md-12 form-group">
                  <input type="submit" class="btn btn-success" name="btn_edit"  value="ตกลง">
              </div>
          </div>
      </div>
    </form>
  </div>
</body>
<script type="text/javascript">
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
