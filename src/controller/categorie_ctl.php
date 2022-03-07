<?php

require "src/model/categorie.php";


function catForm(){

    if(isset($_GET['id'])){
        $rep = getCategorie($_GET['id']); 
    }
    require "src/view/categories/catForm.php";
}


function addOrUpCat(){

    $nom = htmlspecialchars($_POST['nom']);

    if (isset($_GET['id'])){
        $rep = updateCategorie($_GET['id'],$nom);
    }
    else{
        $rep = addCategorie($nom);
    }
    showAllCategories();
}


function showAllCategories(){
    $categories = getAllCategories();
    require "src/view/categories/categorie_view.php";
}


function showCategorie(){

    $rep = getCategorie(); 
    showAllCategories();
}



function deleteCategorie(){

    if (isset($_GET['id'])){

    $id = $_GET['id'];
    $rep = deleteCategorieById($id);
    }
    showAllCategories();
}

