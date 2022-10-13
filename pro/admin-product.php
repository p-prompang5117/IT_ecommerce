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
  <div class="container" >
    <div class="row" >
    <a href="add-product.php" class="btn btn-primary">Add-product</a>
    </div>
    <div class="table-responsive">
      <table style="background:#f2bcf2" class="table">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">ชื่อสินค้า</th>
    <th scope="col">ราคา</th>
    <th scope="col">จำนวน</th>
    <th scope="col">รูป</th>
    <th scope="col">ประเภท</th>
    <th scope="col">หมายเหตุ</th>
  </tr>
</thead>
<tbody>
    <?php
    $n=1;
    $sql = ("SELECT * FROM products");
    $result=$mysqli->query($sql);
      while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
          <th scope="row"><?php echo $n; ?></th>
          <td><?php echo $row['products_name']; ?></td>
          <td><?php echo $row['products__price']; ?></td>
          <td><?php echo $row['products_quantity']; ?></td>
          <td><?php echo $row['products_img']; ?></td>
          <td><?php echo $row['products_category']; ?></td>
          <td>
             <a href="edit-products.php?id=<?php echo $row['products_id']; ?>" class="btn btn-success">แก้ไข</a>
             <a href="#" class="btn btn-danger" onclick="checkdel(<?php echo $row['products_id']; ?>)" id="del">ลบสินค้านี้</a>
           </td>
        </tr>
        <?php
        $n++;
      }
     ?>
</tbody>
</table>
    </div>
  </div>
</body>
<script type="text/javascript">
  function checkdel(del){
              swal({
            title: "คุณมั่นใจไหมว่าจะลบสินค้าชิ้นนี้?",
            text: "หากคุณลบไปแล้ว เป็นไปได้ยากว่าจะกู้มันกลับมานะ!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location.href = "del-products.php?pro_id="+del
            } else {
              swal("สินค้าของคุณปลอดภัยแล้ว เย้!");
            }
          });
  }
</script>
