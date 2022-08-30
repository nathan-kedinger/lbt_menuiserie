<?php
	require_once '../../controller/bdd/connexion_bdd_local.php'; 
    
    if(isset($_GET['username'], $_GET['cle']) AND !empty($_GET['username']) AND !empty($_GET['cle'])){
    $username = htmlspecialchars(urldecode($_GET['username']));
    $cle = htmlspecialchars($_GET['cle']);

        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requeteUser = $pdo->prepare("
        SELECT * FROM base_users WHERE username = :username AND cle = :cle
        ");
        $requeteUser->bindParam(':username',$username);
        $requeteUser->bindParam(':cle',$cle,PDO::PARAM_INT);
        $requeteUser->execute();
        $userExist = $requeteUser->rowCount();
        if($userExist == 1){
            $user = $requeteUser->fetch();
            if($user['confirmation'] == 0){
                $updateUser = $pdo->prepare("
                UPDATE base_users SET confirmation = 1 WHERE username = :username AND cle = :cle");
                $updateUser->bindParam(':username',$username);
                $updateUser->bindParam(':cle',$cle,PDO::PARAM_INT);
                $updateUser->execute();
                echo 'Votre compte a bien été confirmé, vous pouvez vous connecter.';
            }else{
                echo 'Votre compte a déjà été confirmé.';
            }
        } else {
            echo 'L\'utilisateur n\'existe pas.';
        }     
        }
        catch(PDOException $e){
            die ($e->getMessage());
        }
	 
    }else{
        echo'prout';
        var_dump($username);
    }


