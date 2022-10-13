<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_SESSION['user_id'])) {
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
     <div class="table-responsive">
       <table style="background:#f2bcf2" class="table">
 <thead>
   <tr>
     <th scope="col">#</th>
     <th scope="col">ชื่อสินค้า</th>
     <th scope="col">ผู้ซื้อ</th>
     <th scope="col">จำนวนที่สั่งซื้อ</th>
     <th scope="col">ราคาสินค้า</th>
     <th scope="col">ราคารวมสินค้า</th>
   </tr>
 </thead>
 <tbody>
 <?php
 $id=$_SESSION['user_id'];
 $n=1;
 $sql = "SELECT * FROM bill";
 $result=$mysqli->query($sql);
   while ($row = mysqli_fetch_array($result)) {
     ?>
     <tr>
       <th scope="row"><?php echo $n; ?></th>
       <td><?php echo $row['bill_products_name']; ?></td>
       <td><?php  $prepare="SELECT user_name,user_id FROM users";
       $compare=$mysqli->query($prepare);
       while($row2= mysqli_fetch_array($compare)){
         if ($row['bill_customer']==$row2['user_id']) {
           echo $row2['user_name'];
         }
       } ?></td>
       <td><?php echo $row['bill_product_qty']; ?></td>
       <td><?php echo $row['bill_price']; ?></td>
       <td><?php echo $row['bill_result_price']; ?></td>
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
