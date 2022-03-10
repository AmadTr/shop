<?php 
session_start();
require "src/model/user.php";

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
            $mailBdd = false;
            $passwordBdd = false;
        }

        if (($email == $mailBdd ) && ($password == $passwordBdd)) {
  
            $_SESSION['id'] = $rep->getId();
            $_SESSION['status'] = $rep->getStatus_Id();
            $_SESSION['firstname'] = $rep->getFirstName();

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