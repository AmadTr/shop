<?php
    ob_start();

if (isset($_GET['id'])) {
    $id = $rep ->getId_prod();
    $nom = $rep->getName();
    $cat = $rep->getCategory_id();
    $quant = $rep->getQuantity();
    $prix = $rep->getUnit_price();

    $link = "index.php?action=ajtOuModifProd&id=$id";
    $btn ='Modifiez le Produit';
}
else{
    $nom = "";
    $cat = "";
    $quant = "";
    $prix = "";

    $link = 'index.php?action=ajtOuModifProd';
    $btn ='Ajoutez le Produit';
}
?>

<form action=<?= $link ?> method="post">

   <div class="form-group mb-20"> 
        <label for="nom">Nom du Produit</label>
        <input type="text" class="form-control" id="nom" name="nom" value=<?= $nom ?>>
    </div>
    
    <div class="form-group mb-20"> 
        <label for="categorie">Categorie</label>
        <input type="text" class="form-control" id="categorie" name="categorie" value=<?= $cat ?>>
    </div>
    
    <div class="form-group mb-20"> 
        <label for="quantite">Quantite</label>
        <input type="text" class="form-control" id="quantite" name="quantite" value=<?= $quant ?>>
    </div>
    
    <div class="form-group mb-20"> 
        <label for="prix">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix" value=<?= $prix ?>>
        <button type="submit" class="btn btn-primary"><?= $btn ?></button>
    </div>

</form>

<?php
$content = ob_get_clean();
require "src/view/template.php";
?>