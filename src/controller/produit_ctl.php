<?php
require "src/model/produit.php";


function prodForm(){

    if(isset($_GET['id'])){
        $rep = getProduit($_GET['id']); 
    }
    require "src/view/produits/prodForm.php";
}


function addOrUpProd(){

    $nom = htmlspecialchars($_POST['nom']);
    $cat = htmlspecialchars($_POST['categorie']);
    $quant = htmlspecialchars($_POST['quantite']);
    $prix = htmlspecialchars($_POST['prix']);

    if (isset($_GET['id'])){

        $id = $_GET['id'];
        $rep = updateProduit($id, $nom, $cat, $quant, $prix);
    }
    else{
        $rep = addProduit($nom, $cat, $quant, $prix);
    }
    showAllProduits();
}


function deleteProduit(){

    if (isset($_GET['id'])){

        $id = $_GET['id'];
        $rep = deleteProduitById($id);
    }
}


function showAllProduits(){
    $resul = getAllProduits();
    require "src/view/produits/produit_view.php";
}



