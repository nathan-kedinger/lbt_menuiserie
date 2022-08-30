<?php
session_start();
require_once '../../controller/bdd/connexion_bdd_local.php'; 

if(isset($_POST['username']) && (isset($_POST ['password'])))
{
    $username = $_POST['username'];

    try{
        //get datas from DB table: connexion
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sth = $pdo->prepare("
            SELECT * FROM  base_users WHERE username  = :username"
            );
            $sth->bindParam(':username',$username);
            if ($sth->execute())
            {
                $user = $sth->fetch(PDO::FETCH_ASSOC);
                if($user === false)
                {
                    echo 'identifiants invalide';
                } else{

                    //vérification du hash du password
                    if(password_verify($_POST['password'], $user['password']))
                    {   
                        if($user['confirmation'] != 1) throw new Exception('Vous n\'avez pas encore validé votre compte. Veuillez cliquer sur le lien de confirmation reçu dans votre mail.');

                                $_SESSION['username'] = $username;
                                $delai=1.5; // Délai en secondes
                                $url='admin/private_admin.php'; // Adresse vers laquelle rediriger le visiteur
                                // Redirection dans x secondes
                                header('Refresh: '.$delai.';url='.$url);
                    
                    } else {
                        echo 'Identifiants invalides';
                    }
                }
            } else {
                 echo 'Impossible de récupérer l\'utilisateur';
            }
        }
        catch(PDOException $e){
            die ($e->getMessage());
        } 
        catch(Exception $e){
            die ('Erreur : '.$e->getMessage().'');
        }

} else {
    echo 'veuillez remplir tous les champs';
}
    
