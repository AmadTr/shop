<?php

    // require "model/dbaccess.php";
    require "src/controller/categorie_ctl.php";
    require "src/controller/produit_ctl.php";
    require "src/controller/security_ctl.php";
    require "src/model/dbaccess.php";
    
    function home() {
        $titre = "Shop & Food : Accueil";
        ob_start();

?>
       <h1>SHOP & FOOD</h1>

<?php
$content = ob_get_clean();
require "src/view/template.php";
}
?>

<?php
    // ROUTER
    // ******
    if(isset($_GET['action'])){

        $action = $_GET['action'];

        switch ($action) {
// CRUD CATEGORIE
            case 'home':
                home();
            break;

            case 'showCats': 
                showAllCategories();
            break;
               
            case 'ajtOuModifCat':
                addOrUpCat();
            break;
                    
            case 'delCat':
                deleteCategorie();
            break;
                        
            case 'modifCat':
            case 'addCat': 
                catForm();
            break;


// CRUD PRODUIT                                                    
            case 'showProds':
                showAllProduits();
            break;
            
            case 'ModifProd':
            case 'addProd':
                prodForm();
            break;

            case 'ajtOuModifProd':
                addOrUpProd();
            break;

            case 'delProd':
                deleteProduit();
            break;

// CONNEXION
            case 'login':
                logIn();
            break;

            case 'valid':
                valide();
            break;

            case 'logout':
                logOut();
            break;


            
            default:
                header("location: index.php?action=home");
}
    }
    else {
        header("location: index.php?action=home");
    }
?>
