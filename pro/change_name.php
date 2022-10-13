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
   background-image: url("img/bg1.png");
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
     <form class=""  action="change_name_active.php?id=<?php echo $_SESSION['user_id']; ?>" method="post" id="change-me">
       <div class="simple-login-container">
           <h2>About-me</h2>
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
                       <label for="oldpwd">รหัสผ่าน</label>
                     <input type="password" name="pwd" class="form-control input-sm" placeholder="password" required min="6" max="12">
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
