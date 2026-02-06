<?php
session_start();
session_destroy();
header("Location: wyniki.php");
exit;
?>