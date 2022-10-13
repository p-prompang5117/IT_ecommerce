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
 <style media="screen">
 body{
   background-image: url("img/bg1.png");
 }
 </style>
<body>
  <div class="container">
    <div class="row">
      <button type="button" class="btn" style="background:#fc5185;"  data-toggle="modal" data-target="#cate">
        category
      </button>
    </div>
    <div class="table-responsive">
      <table style="background:#f2bcf2" class="table">
<thead>
  <tr>
    <th>ลำดับ</th>
    <th>ชื่อประเภท</th>
  </tr>
</thead>
<tbody>
    <?php
    $sql = ("SELECT * FROM category");
    $result=$mysqli->query($sql);
      while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
          <td><?php echo $row['category_id']; ?></td>
          <td><?php echo $row['category_name']; ?></td>
        </tr>
        <?php
      }
     ?>
</tbody>
</table>
    </div>
  </div>
</body>
<!-- Modal add-cate -->
<div class="modal fade" id="cate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header" style="background:#fc5185;">
    <h5 class="modal-title" id="exampleModalLabel">Add-category</h5>
    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body" style="background:#fc5185;">
    <form class=""  action="add-cate-active.php" method="post">
      <div class="simple-login-container">
          <h2>Add-category</h2>
          <div class="row">
              <div class="col-md-12 form-group">
                  <input type="text" class="form-control" name="cate" placeholder="ชุดจีน">
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 form-group">
                  <input type="submit" class="btn btn-success" name="btn_add_cate" value="Submit">
              </div>
          </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
