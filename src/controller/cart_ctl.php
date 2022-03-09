<?php 

if(session_status()==1){
    session_start();
}

function panier(){

    require "src/view/panier/panier_view.php";
}

function addP(){

    // if (!isset($_SESSION['panier'])){ 
        $prod = getProduit($_GET['id']);

        $_SESSION['panier'] = [];

        $_SESSION['panier']['nomProd'] = array();
        $_SESSION['panier']['qteProd'] = 1;
        $_SESSION['panier']['prixProd'] = array();
      
        $_SESSION['panier']['nomProd'] = $prod->getName();
        $_SESSION['panier']['qteProd'] = 1;
        $_SESSION['panier']['prixProd'] = $prod->getUnit_price();

        require "src/view/panier/panier_view.php";

    // }


}



