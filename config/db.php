<?php
function db(){
$dblocation ="127.0.0.1";
$dbname = "myshop";
$dbuser = "root";
$dbpasswd = "";

$db = mysqli_connect($dblocation,$dbuser,$dbpasswd);
$db = new mysqli($dblocation, $dbuser, $dbpasswd,$dbname);

if($db->connect_errno) {
        die('MySQL access denied.');
    }

   return $db;
}