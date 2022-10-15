<?php
require_once 'navbar.php';
require_once 'connect.php';
$bill_id = $_GET['id'];


if (!isset($_SESSION['user_id'])) {
    echo "Not logged in yet";

if (isset($_POST['bill_submit'])){
    $file=basename($_FILES["fileToUpload"]["name"]);
    $pd = $_POST['paiddate'] ;
    $sql="UPDATE bill SET 
        bill_status = 'pending', 
        bill_img = $file 
        WHERE bill_id = $bill_id ";
    $update = ($mysqli->query($sql));
    if ($update) {
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
        {  echo '<script type="text/javascript">
                   swal({
                       icon: "success",
                       text: "แก้ไขสินค้าเสร็จสิ้น",
                       title: "ยินดีด้วย",
                       buttons: {
                         ok: "ตกลง",
                       }
                     })
                     .then((value)=> {
                       window.location.href = "admin-product.php"
                     })
               </script>';
             }
      }else{
        echo "failed lmao" ;
      }

}

}
?>

<style>

</style>

<body>
    
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
            <input class="form-control" type="file" id="formFile">
    </div>
   
    <input type="submit" class="btn btn-sm btn-primary" name="bill_submit">

</form>

</div>    


</body>