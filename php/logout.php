<?php

session_start();

if($_SESSION['user']){

    $_SESSION['user'] = 'none';
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
    header('Location:../index.php');
  }
  else {
      echo "failed";
  }
?>