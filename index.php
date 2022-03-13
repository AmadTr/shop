<?php

    // require "model/dbaccess.php";
    require "src/controller/categorie_ctl.php";
    require "src/controller/produit_ctl.php";
    require "src/controller/security_ctl.php";
    require "src/controller/cart_ctl.php";
    require "src/controller/order_ctl.php";
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



    // ROUTER
    // ******
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
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
// PANIER

            case 'showPanier':
                panier();
            break;

            case 'addP':
                addP($id);
            break;

            case 'qteMoins':
                qteMoins($id);
            break;

            case 'qtePlus':
                qtePlus($id);
            break;
            
            case 'supProd':
                supProd($id);
            break;

            case 'effPanier':
                effPanier();
            break;

            case 'validPanier':
                validPanier();
            break;

            default:
                header("Location: index.php?action=home");
}
    }
    else {
        header("location: index.php?action=home");
    }
?>
