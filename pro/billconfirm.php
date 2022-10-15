<?php
require_once 'navbar.php';
require_once 'connect.php';
if (!isset($_SESSION['user_id'])) {
    echo "Not logged in yet";
}
?>

<style>

</style>

<body>
    
<div class="container">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <span> Your Order ID is [ <?php echo extract($_GET) ?> ]</span>
    </div>
    <div class="form-group">
            <label for="paiddate">วันที่ชำระเงิน</label>
            <input type="date" id="paiddate" name="paiddate">
    </div>

    <div class="form-group">
            <label for="formFile" class="form-label"> อัพโหลดรูปใบเสร็จ </label>
            <input class="form-control" type="file" id="formFile">
    </div>
   
    <input type="submit" class="btn btn-sm btn-primary">

</form>

</div>    


</body>