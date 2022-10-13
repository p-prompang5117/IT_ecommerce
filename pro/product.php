<?php
//require_once 'navbar.php';
require_once 'connect.php';
$sql="SELECT * FROM products";
$result=$mysqli->query($sql);
while ($row=mysqli_fetch_array($result)) {
  ?>
  <div class="row" >
    <div class="col-md-6">
      <div class="card flex-md-row mb-4 box-shadow h-md-250" style="background:#5d6a6f;">
        <div class="card-body d-flex flex-column align-items-start">
          <strong class="d-inline-block mb-2 text-success">
             <a href="#" class="btn text-white" style="background:#85a2aa;">
            <?php echo $row['products_category']; ?></a>
          </strong>
          <h3 class="mb-0">
            <p class="text-white"><?php echo $row['products_name']; ?></p>
          </h3>
          <p class="card-text mb-auto text-white">ราคาสินค้า: <?php echo $row['products__price']; ?><br>
          จำนวนคงเหลือ: <?php echo $row['products_quantity']; ?></p>
          <a href="#" class="btn btn-info btn-sm">สั่งซื้อ</a>
        </div>

        <img class="card-img-right flex-auto d-none d-md-block" src="<?php echo $row['products_img']; ?>" alt="Thumbnail [200x250]"  style="width: 200px; height: 250px;">

      </div>
    </div>
     </div>

  <?php
}
 ?>
