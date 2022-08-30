<?php
$servname = "localhost"; $dbname = "lbt_menuiserie"; $user = "root"; $pass = ""; 

$pdo = new PDO("mysql:host=$servname;dbname=$dbname",$user,$pass);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
