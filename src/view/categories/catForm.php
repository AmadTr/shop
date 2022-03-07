<?php
    ob_start();

if (isset($_GET['id'])) {
    $id = $rep ->getId();
    $link = "index.php?action=ajtOuModifCat&id=$id";
    $btn ='Modifiez la Categorie';
    $nom = $rep->getName();
}
else{
    $link = 'index.php?action=ajtOuModifCat';
    $btn ='Ajoutez la Categorie';
    $nom ='';
}
?>

<form action=<?= $link ?> method="post">

   <div class="form-group mb-20"> 
        <label for="nom">Nom de Categorie</label>
        <input type="text" class="form-control" id="nom" name="nom" value=<?= $nom ?>>
        <button type="submit" class="btn btn-primary"><?= $btn ?></button>
    </div>
</form>

<?php
$content = ob_get_clean();
require "src/view/template.php";
?>