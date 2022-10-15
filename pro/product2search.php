<?php
require_once 'navbar.php';
require_once 'connect.php';
$sch=$_POST['sch'];
 ?>
 <?php
 require_once 'navbar.php';
 require_once 'connect.php';
   ?>
   <style media="screen">
   body{
     background-image: url("img/bg1.png");
   }
   </style>
  <body>
     <div class="album py-5">
       <div class="container">
         <div class="row">
           <?php
           $sql="SELECT * FROM products WHERE concat(products_name,products__price,products_category) LIKE '%$sch%'";
           $result=$mysqli->query($sql);
           while ($row=mysqli_fetch_array($result)) {
              ?>
           <div class="col-md-3">
                       <div class="card mb-3 shadow-sm text-white"  style="width:250px; background:#fdafab;">
                         <img class="card-img-top img-thumbnail img-fluid" src="<?php echo $row['products_img']; ?>" alt="Responsive image" style="width: 250px; height: 250px; display: block;" >
                         <div class="card-body">
                           <h3 class="card-text"><?php echo $row['products_name']; ?></h3>
                           <p class="card-text">
                             ราคาสินค้า: <?php echo $row['products__price']; ?><br>
                             จำนวนคงเหลือ: <?php echo $row['products_quantity']; ?><br>
                             ประเภทสินค้า: <?php echo $row['products_category']; ?>
                           </p>
                           <div class="d-flex justify-content-between align-items-center">
                             <div class="btn-group">
                             <?php
                               if (isset($_SESSION['products_id'])) {
                                 ?>
                                   <a href="change.php?id=<?php echo $row['products_id']; ?>"
                                 <?php
                               }else {
                                 ?>
                                 <a href="order.php?id=<?php echo $row['products_id']; ?>
                                 <?php
                               }
                                ?>"
                                 class="btn btn-sm btn-primary">Buy</a>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>

     <?php
   }
    ?>
       </div>
    </div>
    </div>

   </body>
