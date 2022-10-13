<?php
require_once 'navbar.php';
require_once 'connect.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
  body{
    background-image: url("img/bg1.jpg");
  }
  .sidenav {
width: 160px; /* Set the width of the sidebar */
position: fixed; /* Fixed Sidebar (stay in place on scroll) */
z-index: 1; /* Stay on top */
top: 1; /* Stay at the top */
left: 0;
background-color: #95C8D7; /* Black */
overflow-x: hidden; /* Disable horizontal scroll */
padding-top: 20px;
}
  </style>
  <body>
    <nav class="navbar navbar-dark sidenav">
      <a class="navbar-brand" href="#">Menu</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav">
          <li  class="nav-item active">
          <a class="nav-link" href="isdex.php">ทุกประเภท</a>
          </li>
          <?php
          $sqlcate="SELECT * FROM category";
          $resultcate=$mysqli->query($sqlcate);
          while ($row=mysqli_fetch_array($resultcate)){
            ?>
            <li class="nav-item active">
              <a class="nav-link" href="isdex.php?id=<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></a>
            </li>
            <?php
          }
           ?>
        </ul>
      </div>
    </nav>
    <div class="container mt-5">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/banner_zip.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/banner_The_iCon_Group2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/Banner_left.png" alt="Third slide">
    </div>
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br>
  
<section class="features-icons bg-white text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-3">

              <div class="features-icons-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="crimson" class="bi bi-currency-exchange" viewBox="0 0 16 16">
  <path d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z"/>
</svg>
              </div>

              <h3>ยิ่งช้อปยิ่งได้รายได้</h3>

              <p class="lead mb-0">ยิ่่งรับรายได้</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-3">

              <div class="features-icons-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="crimson" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z"/>
</svg>
              </div>

              <h3>สินค้าคุณภาพ</h3>

              <p class="lead mb-0">ใส่ใจจากแบรนด์</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-3">

              <div class="features-icons-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="crimson" class="bi bi-truck" viewBox="0 0 16 16">
                  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
              </div>

              <h3>ส่งไว</h3>

              <p class="lead mb-0">ได้ของชัวร์!</p>
            </div>
          </div>
        </div>
      </div>
    </section>
      <div class="album py-5">
          <div class="row">
            <?php
            if (isset($_REQUEST['id'])) {
              $id=$_REQUEST['id'];
              $sql="SELECT * FROM products WHERE products_category='$id'";
              $result=$mysqli->query($sql);
              while ($row=mysqli_fetch_array($result)){
                 ?>
              <div class="col-md-3">
                          <div class="card mb-3 shadow-sm text-dark" style="width:250px; background:#fdafab;">
                            <img class="card-img-top img-thumbnail img-fluid" src="<?php echo $row['products_img']; ?>" alt="Responsive image" style="width: 250px; height: 250px; display: block;" >
                            <div class="card-body">
                              <h3 class="card-text"><?php echo $row['products_name']; ?></h3>
                              <p class="card-text">
                                ราคาสินค้า: <?php echo $row['products__price']; ?><br>
                                จำนวนคงเหลือ: <?php echo $row['products_quantity']; ?><br>
                                ประเภทสินค้า: <?php echo $row['products_category']; ?>
                              </p>
                              <div class="d-flex justify-content-end align-items-center">
                                <div class="btn-group ">
                                  <?php
                                    if (isset($_SESSION['products_id'])) {
                                      ?>
                                      <a href="change.php?id=<?php echo $row['products_id']; ?>" class="btn btn-sm btn-success">Buy</a>
                                      <?php
                                    }else {
                                      ?>

                                      <a href="order.php?id=<?php echo $row['products_id']; ?>" class="btn btn-sm btn-success">Buy</a>
                                      
                                      <?php
                                    }
                                     ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
        <?php
            }
          }else {
              $sql="SELECT * FROM products";
              $result=$mysqli->query($sql);
              while ($row=mysqli_fetch_array($result)) {
                 ?>
              <div class="col-md-3">
                          <div class="card mb-3 shadow-sm text-dark" style="width:250px; background:#fdafab;">
                            <img class="card-img-top img-thumbnail img-fluid" src="<?php echo $row['products_img']; ?>" alt="Responsive image" style="width: 250px; height: 250px; display: block;" >
                            <div class="card-body">
                              <h3 class="card-text"><?php echo $row['products_name']; ?></h3>
                              <p class="card-text">
                                ราคาสินค้า: <?php echo $row['products__price']; ?><br>
                                จำนวนคงเหลือ: <?php echo $row['products_quantity']; ?><br>
                                ประเภทสินค้า: <?php echo $row['products_category']; ?>
                              </p>
                              <div class="d-flex justify-content-end align-items-center">
                                <div class="btn-group ">
                                <?php
                                  if (isset($_SESSION['products_id'])) {
                                    ?>
                                    <a href="change.php?id=<?php echo $row['products_id']; ?>" class="btn btn-sm btn-primary">Buy</a>
                                    <?php
                                  }else {
                                    ?>
                                    <a href="addcart.php?id=<?php echo $row['products_id']; ?>" class="btn btn-sm btn-secondary">Add to cart</a>
                                    <a href="order.php?id=<?php echo $row['products_id']; ?>" class="btn btn-sm btn-primary">Buy</a>
                                    
                                    <?php
                                  }
                                   ?>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

        <?php
          }
        }
       ?>


        </div>
     </div>
    </div>
  </body>
</html>
