<?php
session_status();
ob_start();
$titre = 'Produits'

?>
<h1>Votre liste de Produits</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Categorie</th>
      <th scope="col">Quantite</th>
      <th scope="col">Prix</th>
    </tr>
  </thead>
  <tbody>

<?php
foreach ($resul as $p){
  echo "  <tr>
           <td>".$p->getId_prod()."</td>
           <td>".$p->getName()."</td>
           <td>".$p->getCategory_id()."</td>
           <td>".$p->getQuantity()."</td>
           <td>".$p->getUnit_price().'€'."</td>
           <td>
            <a class='btn btn-warning' href='index.php?action=ModifProd&id=".$p->getId_prod()."'>Modifier</a>
            <a class='btn btn-danger' href='index.php?action=delProd&id=".$p->getId_prod()."'>Supprimer</a>
            </td>
    </tr>";
}
?>
  </tbody>
</table>

<?php
echo"<a class='btn btn-primary' href='index.php?action=addProd'>Ajoutez un nouveau produit</a>";

$content = ob_get_clean();
require "src/view/template.php";
?>