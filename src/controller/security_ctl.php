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
        $rep = getUser($email);

        if (($_POST['email']==$rep->getEmail()) && ($_POST['password']==$rep->getPassword())) {
  
            $_SESSION['id'] = $rep->getId();
            $_SESSION['statut'] = $rep->getStatus_Id();
            // $_SESSION['firstname'] = $rep->getFirstName();
            // $_SESSION['name'] = $rep->getName();
            header("Location : index.php");
        }
        else{

        require "src/view/users/userForm.php";
        }
    }
}

function logOut(){
    session_start();
    session_destroy();
    session_unset();
    header("Location: index.php");
}