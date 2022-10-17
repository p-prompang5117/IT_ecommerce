<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_SESSION['user_id'])){
  if (isset($_GET['adding_id'])){
    $addid=$_GET['adding_id'];
    $userid=$_SESSION['user_id'];
    $sql = ("SELECT * FROM products WHERE products_id=$addid");
    $result=$mysqli->query($sql);
    $row = mysqli_fetch_array($result);
    $prodname=$row['products_name'];
    $prodprice=$row['products__price'];

    $sql = ("SELECT * FROM bill WHERE bill_customer='$addid' AND bill_status = 'cart'");
    $result=$mysqli->query($sql);
    $row = mysqli_fetch_array($result);

    $billprice = 1;
    $sumprice = $prodprice * $billprice ;


    $sql = "INSERT INTO bill (bill_id, bill_products_name, bill_customer, bill_price, bill_result_price, bill_product_qty, bill_status, bill_img,bill_timestamp) 
    VALUES (NULL, '$prodname', '$userid', '$prodprice', '$sumprice', '$billprice', 'cart', NULL, current_timestamp());";
    $result=$mysqli->query($sql);

 }


?>
<style media="screen">
.table td, .table th{
    vertical-align: middle;
    
}
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
    $sql = ("SELECT * FROM bill WHERE bill_customer='$id' AND bill_status = 'cart'");
    $result=$mysqli->query($sql);
      while ($row = mysqli_fetch_array($result)) {
        ?>

        <form action="buy-get.php" method="post">
        <tr>
          <th scope="row"><?php echo $n; ?></th>
          <td ><?php echo $row['bill_products_name']; ?></td>
          <td><?php  if ($row['bill_customer']==$_SESSION['user_id']) {
            echo $_SESSION['user_name'];
          } ?></td>
          <td> 
            <center><input type="number" min="1" step="1" style="width:auto" class="form-control" value="<?php echo $row['bill_product_qty']; ?>" id="qtydial" name="qtydial"> </center>
            <script>
              document.getElementById("qtydial").onchange = function() {myFunction()};
              function myFunction() {

                var x = parseInt(document.getElementById("qtydial").value);
                var y = parseInt(document.getElementById("bill_price").textContent);
                var z = y * x ;
                
                console.log(x) ;
                console.log(y) ;
                console.log(z) ;
                console.log('\n') ;

                document.getElementById("sump").textContent = z; 
                
              }
            </script>
              <input type="hidden" name="bid" value="<?php echo $row['bill_id']; ?>">
              <input type="hidden" name="prodname" value="<?php echo $row['bill_products_name']; ?>"> 
              <input type="hidden" name="prodprice" value="<?php echo $row['bill_price']; ?>"> 
           
            
           
          </td>
          <td><span id ="bill_price"> <?php echo $row['bill_price']; ?> </span></td>
           <td> <span name="sump" id="sump"><?php echo $row['bill_result_price']; ?></span> </td> 
          <!--<td><a href="buy-get.php?id=<?php echo $row['bill_id']; ?>&name=<?php echo $row['bill_products_name']; ?>&price=<?php echo $row['bill_result_price']; ?>" class="btn btn-sm btn-primary">ซื้อสินค้า</a></td> -->

          <th> <input type="submit" name="addsubmit" class="btn btn-sm btn-primary" value="ยืนยันการซื้อ"> </th>
          
          <td><a href="del-products-get.php?id=<?php echo $row['bill_id']; ?>" class="btn btn-sm btn-danger">ลบออกจากตะกร้า</a></td>
        </tr>

        <?php
        $n++;
      }
     ?>
          

</tbody>
</table>
</form>
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
