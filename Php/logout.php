<?php
session_start();

if(isset($_POST['logout']) && isset($_SESSION['u_name']))
{
  session_unset(); 
  session_destroy();
}
else
{
    echo "<script>location.replace('../Html/403.html')</script>;";
}

?>