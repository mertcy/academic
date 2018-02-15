<?php
session_start();
session_destroy();
echo 'Cikis yapilmistir. <a href="/">Geri don.</a>';
header("Location: http://localhost/index.php");
?>
