<?php
require_once '../../controller/bdd/connexion_bdd_local.php'; 

// Add the users informations
try{

    //Are all the fields full 
    if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['name']) || empty($_POST['firstName']) || empty($_POST['email'])) throw new Exception("Veuillez remplir tous les champs.");
    //Are the passwords similar
    if($_POST['password'] !== $_POST['password-confirm']) throw new Exception("Le mot de passe est différent.");
    //Are t he email adress similar
    if($_POST ['email'] !== $_POST['email-confirmation']) throw new Exception("L'adresse mail ne correspond pas.");

    //send datas to DB table: base_users
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //creation of the id variables
    $name =  $_POST['name'];
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    //hashing password
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    //verification key email
    $cle = md5(microtime(TRUE)*100000);


    //verify that username and email adress aren't already used
    $answer = $pdo->query('
    SELECT email FROM base_users WHERE email="'.$_POST['email'].'"  
    ');
    $datas = $answer->fetch();
    if($datas['email'] === $_POST['email'])throw new Exception("Cette adresse mail est déjà utilisée.");

    $answer = $pdo->query('
    SELECT username FROM base_users WHERE username="'.$_POST['username'].'"
    ');
    $datas = $answer->fetch();
    if($datas['username'] === $_POST['username'])throw new Exception("Ce nom d'utilisateur est déjà utilisé");


    //insertion of IDs into the db
    $sth = $pdo->prepare("
    INSERT INTO  base_users(name, firstName, email, username, password, cle)
    VALUES (:name, :firstName, :email,:username, :password, :cle)
    ");
    $sth->bindParam(':name',$name);
    $sth->bindParam(':firstName',$firstName);
    $sth->bindParam(':email',$email);
    $sth->bindParam(':username',$username);
    $sth->bindParam(':password',$password);
    $sth->bindParam(':cle',$cle);
    $sth->execute();

    //create a validation email
    // Préparation du mail contenant le lien d'activation
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "admin@bts-sio-kedinger.fr";
    $to = $email;
    $subject = "Activer votre compte" ;
    $header = "MIME-Version: 1.0"."\r\n";
    $header .= "From: ".$from."\r\n";
    $header .= 'Content-Type:text/html; charset="uft-8"'."\r\n";
    $header .= 'Content-Transfer-Encoding: 8bit'."\r\n";
    
    // Le lien d'activation est composé du login(log) et de la clé(cle)
    $message = 'Salut '.$firstName.'bienvenue sur mon site internet "Nathan Kedinger BTS SIO",\n
    
    Pour activer ton compte, cliques sur le lien ci-dessous \n
    ou copier/coller dans ton navigateur Internet. \n
    
    https://www.bts-sio-kedinger.fr/model/connexion/register_confirmation.php?username='.urlencode($username).'&cle='.urlencode($cle).' \n
    
    
    ---------------
    Ceci est un mail automatique, Merci de ne pas y répondre.'; 
    
    
    $return = mail($to, $subject, $message, $header) ;
    if ($return){
        echo "Le mail de confirmation a bien été envoyé."; 
    } else {
        echo "le mail de confirmation n'est pas parti.";
    }
}
catch(PDOException $e){
    die ($e->getMessage());
}   
catch(Exception $e){
    die('<article>Erreur : ' .$e->getMessage().'</article>');
}