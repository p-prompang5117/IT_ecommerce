<?php
require_once 'navbar.php';
$bill_id = $_GET['id'];
$db_username = 'root';
$db_password = '';
$db_name = 'Cosplay2';
$db_host = 'localhost';
$mysqli = new mysqli($db_host,$db_username, $db_password,$db_name);
mysqli_query($mysqli, "SET NAMES 'utf8' ");



if (isset($_POST['bill_submit'])){
    $file=basename($_FILES["fileToUpload"]["name"]);
    $pd = $_POST['paiddate'] ;
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


    $sql= "UPDATE bill SET 
    bill_status = 'pending', 
    bill_img = '$file'
    WHERE bill_id = '$bill_id' ";


    $update = ($mysqli->query($sql));
    if ($update) {
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
        {  echo '<script type="text/javascript">
                   swal({
                       icon: "success",
                       text: "ยืนยันการชำระเงินเสร็จสิ้น โปรดรอ 2-3 วันทำการ",
                       title: "ยืนยันการชำระเงินเสร็จสิ้น",
                       buttons: {
                         ok: "ตกลง",
                       }
                     })
                     .then((value)=> {
                       window.location.href = "order-history.php"
                     })
               </script>';
             }
      }else{
        echo "failed lmao" ;
      }
}

?>


<div class="container">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <span> Your Order ID is [ <?php echo $bill_id; ?> ]</span>
    </div>
    <div class="form-group">
            <label for="paiddate">วันที่ชำระเงิน</label>
            <input type="date" id="paiddate" name="paiddate">
    </div>

    <div class="form-group">
            <label for="formFile" class="form-label"> อัพโหลดรูปใบเสร็จ </label>
            <input class="form-control" type="file" id="fileToUpload" name="fileToUpload">
    </div>
   
    <input type="submit" class="btn btn-sm btn-primary" name="bill_submit">

</form>

</div>    
