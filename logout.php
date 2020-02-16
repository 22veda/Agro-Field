<?php    
session_start();
session_destroy();
echo '<div style="padding:10px;border:5px solid black">You have been logged out.<a href="index.php"><< Go back</a></div>';
?>