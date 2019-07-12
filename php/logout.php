<?php
if($_SESSION['user']){
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
  }
?>
    <script >
        window.location.href = "../index.php";
    </script>
<?php
?>