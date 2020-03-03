<?php
  session_start();
  session_unset();
  session_destroy();
  // header("Location: form/index.php");
  // exit();
 echo "<script>window.open('form/index.php','_self')</script>";

  ?>