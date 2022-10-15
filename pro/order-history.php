<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_SESSION['user_id'])) {
?>
<style media="screen">
 body{
   background-image: url("img/bg1.jpg");
 }

 .container{
    padding-top: 10px;
 }

 .row{
    padding-top: 10px;
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
    <th scope="col">สถานะ</th>
    <th scope="col">เวลา</th>
  </tr>
</thead>
<tbody>
    <?php
    $id=$_SESSION['user_id'];
    $n=1;
    $sql = ("SELECT * FROM bill WHERE bill_customer='$id'");
    $result=$mysqli->query($sql);
      while ($row = mysqli_fetch_array($result)) {
        $status = $row['bill_status'];
        if ($status == "not paid"){
          $status = "ชำระเงินแล้ว";
        }else if($status == "paid"){
          $status = "รอการชำระเงิน";
        }
        ?>
        <tr>
          <th scope="row"><?php echo $n; ?></th>
          <td><?php echo $row['bill_products_name']; ?></td>
          <td><?php  if ($row['bill_customer']==$_SESSION['user_id']) {
            echo $_SESSION['user_name'];
          } ?></td>
          <td><?php echo $row['bill_product_qty']; ?></td>
          <td><?php echo $row['bill_price']; ?></td>
          <td><?php echo $row['bill_result_price']; ?></td>
          <td><?php echo $status; ?></td>
          <td><?php echo $row['bill_timestamp']; ?></td>
          <?php if ($row['bill_status'] == "not paid"){ ?>
          <td><a href="billconfirm.php?id=<?php echo $row['bill_id']; ?>" class="btn btn-sm btn-secondary">Confirm payment</a></td>
          <?php }  ?>
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
<?php
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
 ?>
