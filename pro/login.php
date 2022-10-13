<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_SESSION['user_name'])) {
  echo '<script type="text/javascript">
           swal({
               icon: "success",
               text: "คุณได้ล็อกอินแล้ว",
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
<body style="background:#198754;">
  <div class="container bg-warning">
    <div class="container">
      <form class=""  action="login-active.php" method="post">
            <h2 class="text-center">Login Form</h2>
            <div class="row justify-content-center align-items-center">
                  <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group">
                      <label for="mail">E-mail</label>
                      <input type="text" name="email" id="mail" class="form-control" placeholder="กรุณากรอกอีเมลล์" required>
                    </div>
                  </div>
              </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group">
                      <label for="pwd">Password</label>
                      <input type="password" id="pwd" name="pwd" class="form-control"  placeholder="Enter your Password" required>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-xs-3 col-sm-3 col-md-3">
                  <div class="from-group">
                    <input type="submit" class="btn btn-success" name="btn_login" value="Login">
                  </div>
                </div>
            </div>
      </form>
    </div>
  </div>
</body>
