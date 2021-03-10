<?php
session_start();

if($_SESSION['post'] != "") {
     print($_SESSION['post']);
 }

?>
