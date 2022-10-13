<!DOCTYPE html>
<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Mali:wght@200;300&display=swap" rel="stylesheet">
<link id="themecss" rel="stylesheet" type="text/css" href="//www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/jquery-1.11.1.min.js"></script>
 <script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<style media="screen">
  *{
    font-family: 'Mali', cursive;
  }
</style>
    <title>BOOM ผลิตภัณฑ์อาหารเสริม</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-md sticky-top" style="background:#fe78b3;">
      <a class="navbar-brand" href="isdex.php" style="color:white;">หน้าแรก</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          <a class="nav-link" href="about-us.php" style="color:white;">About-US</a>
        </li>

          <?php if (isset($_SESSION['user_tier'])) {
            if ($_SESSION['user_tier']==0) {
            ?>
            <li class="nav-item dropdown" >
              <a class="nav-link dropdown-toggle" href="#" style="color:white;" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="admin-user.php">ดูผู้ใช้งาน</a>
                <a class="dropdown-item" href="admin-product.php">ดูรายการสินค้า</a>
                <a class="dropdown-item" href="admin-order.php">ดูยอดขาย</a>
                <a class="dropdown-item" href="admin-category.php">ดูประเภทสินค้า</a>
              </div>
            </li>
            <?php
            }
          }?>
        </ul>
        <?php if (isset($_SESSION['user_id'])) {
          ?>

            <div class="btn-group mr-1">
              <button type="button" class="btn dropdown-toggle" style="background:##FFFAFA;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo "ยินดีต้อนรับคุณ : ".$_SESSION['user_name']; ?>
              </button>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="addcart.php">ตะกร้าสินค้า</a>
                      <a class="dropdown-item" href="order-history.php">ยืนยันการชำระเงิน</a>
                      <a class="dropdown-item" href="order-history.php">ประวัติการสั่งซื้อ</a>
                      <a class="dropdown-item" href="about_me.php">ข้อมูลของฉัน</a>
                      <a class="dropdown-item" href="change_name.php">เปลี่ยนชื่อ</a>
                      <a class="dropdown-item" href="logout.php">Logout</a>
                  </div>
            </div>

          <?php
        }else {
          ?>
          <div class="nav-item mr-1">
            <button type="button" class="btn" style="background:#c6e0e0;"  data-toggle="modal" data-target="#loginModal">
              Login
            </button>
          </div>
          <div class="nav-item mr-1">
            <button type="button" class="btn" style="background:#ffb7b7;"  data-toggle="modal" data-target="#regis">
              Register
            </button>
          </div>
          <?php
        } ?>
        <!-- Button trigger modal -->

        <form class="form-inline my-2 my-lg-0" action="product2search.php" method="post">
          <input class="form-control mr-sm-2" name="sch" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>


    </nav>
    <!-- Modal register-->
    <!-- Modal -->
<div class="modal fade" id="regis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#3fc1c9;">
        <h5 class="modal-title" id="exampleModalLabel" >สมัครสมาชิก</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class=""  action="regis-active.php" method="post">
          <div class="simple-login-container">
              <h2>Regis Form</h2>
              <div class="row">
  			    				<div class="col-xs-12 col-sm-12 col-md-12">
  			    					<div class="form-group">
                          <label for="mail">E-mail</label>
  			                <input type="email" name="mail" id="mail" class="form-control input-sm" placeholder="E-mail EX. Cool@gmail.com" required>
  			    					</div>
  			    				</div>
  			    		</div>
              <div class="row">
  			    				<div class="col-xs-8 col-sm-8 col-md-8">
  			    					<div class="form-group">
                          <label for="name">ชื่อ</label>
  			                <input type="text" name="name" id="name" class="form-control input-sm" placeholder="Name" required>
  			    					</div>
  			    				</div>
  			    		</div>
                  <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                          <div class="form-group">
                              <label for="pwd">รหัสผ่าน</label>
                            <input type="password" name="pwd" id="pwd" class="form-control input-sm" placeholder="password" required min="6" max="12">
                          </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                          <div class="form-group">
                            <label for="pwd2">ยืนยัน-รหัสผ่าน</label>
                            <input type="password" name="pwd2" id="pwd2" onchange="chkpass()" class="form-control input-sm" placeholder="Confirm Password" required min="6" max="12">
                          </div>
                        </div>
                    </div>
              <div class="row">
                  <div class="col-md-12 form-group">
                      <input type="submit" class="btn btn-success" name="btn_register"  value="ตกลง">
                  </div>
              </div>
          </div>
        </form>
      </div>
      <div class="modal-footer" style="background:#3fc1c9;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <!-- Modal login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#fc5185;">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="background:#fc5185;">
        <form class=""  action="login-active.php" method="post">
          <div class="simple-login-container">
              <h2>Login Form</h2>
              <div class="row">
                  <div class="col-md-12 form-group">
                      <input type="email" class="form-control" name="username" placeholder="Email...">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12 form-group">
                      <input type="password" name="pwd" placeholder="Enter your Password" class="form-control">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12 form-group">
                      <input type="submit" class="btn btn-success" name="btn_login" value="Login">
                  </div>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <script type="text/javascript">
    function chkpass(){
      var pwd1= $('#pwd').val();
      var pwd2= $('#pwd2').val();
      if (pwd1 != pwd2) {
        swal({
            icon: "error",
            text: "กรุณากรอกรหัสผ่านให้ตรงกันทั้งคู่",
            title: "ขออภัย",
            buttons: {
              ok: "ตกลง",
            }
          })
          .then((value)=> {
             window.location.href = "isdex.php"
          })
      }
    }

$(document).ready(function () {
   $("#pwd2").keyup(checkPasswordMatch);

})
  </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/6.3.1/d3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  </body>
</html>
