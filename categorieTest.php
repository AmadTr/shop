<?php
    require "../src/model/categorie.php";
    // test des fonctions :

    // CREATE
    // $create = addCategorie('TEST');


    // READ ALL
    // $categorie = getAllCategories();
    // var_dump($categorie);


    // READ ONE
    $cat = getCategorie(2);
    var_dump($cat);


    //UPDATE
    // $updade = updateCategorie(3,'TESTUP');


    //DELETE
    $del = deleteCategorieById(4);
