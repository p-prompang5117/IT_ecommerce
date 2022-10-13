<?php
session_start();
require_once 'navbar.php';
    if (session_destroy()) {
      echo '<script type="text/javascript">
               swal({
                   icon: "success",
                   text: "เราจะรอคุณกลับมา.....",
                   title: "ออกจากระบบสำเร็จ",
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
