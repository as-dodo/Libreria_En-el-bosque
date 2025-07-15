<?php

require_once ('../_init.php');

session_unset();
session_destroy(); 

header('Location: ../index.php');
exit;
?>