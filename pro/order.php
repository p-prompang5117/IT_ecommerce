<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_SESSION['user_id'])) {

  ?>
  <style media="screen">
  body{
    background-image: url("img/bg1.png");
  }
  </style>
 <body>
  <div class="container">
    <div class="row">
      <div class="table-responsive">
        <table class="table" style="background:#DFA5D6">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ชื่อผู้ซื้อ</th>
      <th scope="col">ชื่อสินค้า</th>
      <th scope="col">ราคาสินค้า</th>
      <th scope="col">จำนวนที่สั่งซื้อ</th>
      <th scope="col">ราคารวมสินค้า</th>
    </tr>
  </thead>
  <tbody>
      <?php
        if (!isset($_SESSION['products_id'])) {
          $id=$_GET['id'];
          $_SESSION['products_id']=$id;
        }
      if (!isset($_SESSION['quantity'])) {
        $_SESSION['quantity'] = 1;
      }
      $pid=$_SESSION['products_id'];
      $sql = ("SELECT * FROM products WHERE products_id=$pid");
      $result=$mysqli->query($sql);
      $row = mysqli_fetch_array($result);
          ?>
          <tr>
            <th scope="row">1</th>
            <td><?php echo $_SESSION['user_name']; ?></td>
            <td><?php echo $row['products_name']; ?></td>
            <td><?php echo $row['products__price']; ?></td>
            <td> <a href="order-active.php?oparator=plus" class="btn btn-sm btn-primary">+</a>
              <?php echo $_SESSION['quantity'];
                if ($_SESSION['quantity']==1) {
                  ?>
                  <a href="#" class="btn btn-sm btn-danger disabled">-</a>
                  <?php
                }else {
                  ?>
                  <a href="order-active.php?oparator=minus" class="btn btn-sm btn-danger">-</a>
                  <?php
                }
              ?>
            </td>
            <td><?php
            $fullprice=$row['products__price']*$_SESSION['quantity'];
            echo $fullprice ?></td>
          </tr>
  </tbody>
  </table>
  <a href="ordet-buy-success.php" class="btn btn-success" id="buy">COD</a>
      </div>
    </div>
  </div>
</body>
  <?php
}elseif(!isset($_SESSION['user_id'])) {
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
