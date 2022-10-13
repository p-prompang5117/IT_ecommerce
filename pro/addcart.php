<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_SESSION['user_id'])) {
?>
<style media="screen">
.table td, .table th{
    vertical-align: middle;
    
}
body{
  background-image: url("img/bg1.png");
}




</style>
<body>
  <div class="container">
    <div class="table-responsive">
      <table style="background:#f2bcf2" class="table text-center">
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
<tbody class="text-center">
    <?php
    $id=$_SESSION['user_id'];
    $n=1;
    $sql = ("SELECT * FROM bill WHERE bill_customer='$id'");
    $result=$mysqli->query($sql);
      while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
          <th scope="row"><?php echo $n; ?></th>
          <td ><?php echo $row['bill_products_name']; ?></td>
          <td><?php  if ($row['bill_customer']==$_SESSION['user_id']) {
            echo $_SESSION['user_name'];
          } ?></td>
          <td> 
            <center><input type="text" style="width:auto" class="form-control" value="<?php echo $row['bill_product_qty']; ?>"> </center>
            
        
          </td>
          <td><?php echo $row['bill_price']; ?></td>
          <td><?php echo $row['bill_result_price']; ?></td>
          <td><a href="order.php?id=<?php echo $row['bill_id']; ?>" class="btn btn-sm btn-danger">Delete</a></td>
          <td> <input type="checkbox" name="checkorder" id="checkorder" checked> </td>
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
