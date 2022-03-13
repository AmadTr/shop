<?php

if(!session_status()){
    session_start();
}

function panier(){

    require "src/view/panier/panier_view.php";
}


function addP($id){

    if (!isset($_SESSION['panier'])){ 

        $_SESSION['panier'] = [];
    }  
     
    if (!isset($_SESSION['panier'][$id])) {
            
        $_SESSION['panier'][$id] = 1;
    }

    else{

        $_SESSION['panier'][$id]++ ;       
    }
    showAllProduits();   
}


function qtePlus($id){

    $_SESSION['panier'][$id]++ ;       
    panier();
}


function qteMoins($id){

    if($_SESSION['panier'][$id]>1){

        $_SESSION['panier'][$id]-- ;       
        panier();
    }
    else{
        supProd($id);
    }
}


function supProd($id){

   unset($_SESSION['panier'][$id]); 

    panier();
}

function effPanier(){

    unset($_SESSION['panier']);
    showAllProduits();   
}

function validPanier(){

    if(isset($_SESSION['id'])){
        addCmd();
    }
    else{
        logIn();
    }
}