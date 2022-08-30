<?php
require_once '../../controller/bdd/connexion_bdd_local.php'; 


if(isset($_SESSION['username'])){
    if(isset($_POST['valider'])){


try{

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sth = $pdo->prepare("
DELETE FROM base_users WHERE username = :username
");
$sth->bindParam(':username',$_SESSION['username']);
$sth->execute();
//array($_SESSION['username'])
session_destroy();

}
catch(PDOException $e){
    die ($e->getMessage());
}  
     } 
}
