<?php 
session_start();
require "src/model/user.php";
// require "src/controller/produit_ctl.php";
// require "src/controller/categorie_ctl.php";


function logIn(){
    require "src/view/users/userForm.php";
}

function valide(){

    if (isset ($_POST['email'])){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);  
    }
        $rep = getUser($email);

        if ($rep) {
            $mailBdd = $rep->getEmail();
            $passwordBdd = $rep->getPassword();
        }
        else{
            $mailBdd = 0;
            $passwordBdd = 0;
        }

        if (($email == $mailBdd ) && ($password == $passwordBdd)) {
  
            $_SESSION['id'] = $rep->getId();
            $_SESSION['status'] = $rep->getStatus_Id();

            header("Location: index.php?action=showProds");
        }
        else{
            
            require "src/view/users/userForm.php";
        }

        
}


function logOut(){
    session_start();
    session_destroy();
    session_unset();
    header("location: index.php");
}