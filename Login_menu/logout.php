<?php
//terminate the session and redirect to index.php
session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit();

?>