<?php
require_once 'navbar.php';
require_once 'connect.php';
if (isset($_SESSION['user_tier'])) {
  if ($_SESSION['user_tier']!=0) {
    echo '<script type="text/javascript">
             swal({
                 icon: "error",
                 text: "หน้านี้เข้าได้เฉพาะ Admin",
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
   <div class="container">
     <div class="table-responsive">
       <table style="background:#f2bcf2" class="table">
 <thead>
   <tr>
     <th scope="col">#</th>
     <th scope="col">E-mail</th>
     <th scope="col">Name</th>
     <th scope="col">Password</th>
     <th scope="col">ระดับ user</th>
     <th scope="col">หมายเหตุ</th>
   </tr>
 </thead>
 <tbody>
     <?php
     $n=1;
     $sql = ("SELECT * FROM users ORDER BY user_id DESC");
     $result=$mysqli->query($sql);
       while ($row = mysqli_fetch_array($result)) {
         ?>
         <tr>
           <th scope="row"><?php echo $n; ?></th>
           <td><?php echo $row['user_email']; ?></td>
           <td><?php echo $row['user_name']; ?></td>
           <td><?php echo $row['user_pass']; ?></td>
           <td><?php echo $row['user_tier']; ?></td>
           <td>
              <a href="#" class="btn btn-danger" onclick="checkdel(<?php echo $row['user_id']; ?>)" id="del">ลบผู้ใช้งานนี้</a>
              <a href="#" class="btn btn-primary" onclick="toadmin(<?php echo $row['user_id']; ?>)" id="admin">แอดมิน</a>
              <a href="#" class="btn btn-success" onclick="tocustom(<?php echo $row['user_id']; ?>)" id="admin">ลูกค้า</a>
            </td>
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
 <script type="text/javascript">
   function checkdel(del){
               swal({
             title: "คุณมั่นใจไหมว่าจะลบผู้ใช้งานคนนี้?",
             text: "หากคุณลบไปแล้ว เป็นไปได้ยากว่าจะกู้มันกลับมานะ!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
               window.location.href = "del-user.php?user_id="+del
             } else {
               swal("ผู้ใช้งานของคุณปลอดภัยแล้ว เย้!");
             }
           });
   }
   function toadmin(admin){
               swal({
             title: "คุณมั่นใจไหมว่าจะทำให้ผู้ใช้งานคนนี้เป็นแอดมิน?",
             text: "ได้โปรดตัดสินใจดีดีนะ!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
               window.location.href = "toadmin.php?user_id="+admin
             } else {
               swal("ผู้ใช้งานของคุณปลอดภัยแล้ว เย้!");
             }
           });
   }
   function tocustom(custom){
               swal({
             title: "คุณมั่นใจไหมว่าจะทำให้ผู้ใช้งานคนนี้เป็นแอดมิน?",
             text: "ได้โปรดตัดสินใจดีดีนะ!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
               window.location.href = "to-customer.php?user_id="+custom
             } else {
               swal("ผู้ใช้งานของคุณปลอดภัยแล้ว เย้!");
             }
           });
   }
 </script>
