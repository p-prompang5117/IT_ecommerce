<?php
require_once 'navbar.php';
require_once 'connect.php';
if (!isset($_SESSION['user_id'])) {
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
  body{
   background-image: url("img/bg1.jpg");
 }

 .container{
    padding-top: 10px;
 }

 .row{
    padding-top: 10px;
 }
}
</style>
<body>
  <?php
  $id=$_SESSION['user_id'];
  $result = $mysqli->query("SELECT * from users WHERE user_id='$id'");//เช็คค่าidจากsession
  if($result === FALSE){
    die(mysql_error());
  }
  if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_array($result);
  } ?>
  <div class="container" style="background:#AFEEEE;">
    <form class=""  action="about_me_active.php" method="post" id="change-me">
      <div class="simple-login-container">
          <h2>About-me</h2>
          <div class="row">
            <input type="hidden" name="myid" id="myid" value="<?php echo $row['user_id']; ?>">
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <div class="form-group">
                      <label for="mail">E-mail</label>
                    <input type="email" name="mail" value="<?php echo $row['user_email']; ?>" id="my-mail" class="form-control input-sm" placeholder="E-mail EX. Cool@gmail.com" required>
                  </div>
                </div>
            </div>
          <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="name">ชื่อ</label>
                    <input type="text" name="name" value="<?php echo $row['user_name']; ?>" id="my-name" class="form-control input-sm" placeholder="Name" required>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-mf-6">
                  <div class="form-group">
                      <label for="oldpwd">รหัสผ่านเก่า</label>
                    <input type="password" name="oldpwd" id="oldpwd" class="form-control input-sm" placeholder="password" required min="6" max="12">
                  </div>
                </div>
            </div>
              <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                          <label for="mypwd">รหัสผ่านใหม่</label>
                        <input type="password" name="newpwd" id="newpwd" class="form-control input-sm" placeholder="password" required min="6" max="12">
                      </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                        <label for="mypwd2">ยืนยัน-รหัสผ่านใหม่</label>
                        <input type="password" name="newpwd2" id="newpwd2" onchange="chkpass()" class="form-control input-sm" placeholder="Confirm Password" required min="6" max="12">
                      </div>
                    </div>
                </div>
          <div class="row">
              <div class="col-md-12 form-group">
                  <input type="submit" class="btn btn-success" name="btn_change"  value="ตกลง">
              </div>
          </div>
      </div>
    </form>
  </div>
</body>
<script type="text/javascript">
  function chkpass(){
    var pwd1= $('#newpwd').val();
    var pwd2= $('#newpwd2').val();
    var pwd3= $('#oldpwd').val();
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
           window.location.href = "about_me.php"
        })
    } else if (pwd2 == pwd3) {
      swal({
          icon: "error",
          text: "กรุณากรอกรหัสผ่านไม่ให้ตรงกับของเก่า",
          title: "ขออภัย",
          buttons: {
            ok: "ตกลง",
          }
        })
        .then((value)=> {
           window.location.href = "about_me.php"
        })
    }
  }
</script>
