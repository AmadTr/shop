<?php 
if(session_status()==1){
    session_start();
}
ob_start();
$titre = 'Produits';

?>
<h1>Votre liste de panier</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Produit</th>
      <th scope="col">Quantite</th>
      <th scope="col">Prix</th>
    </tr>
  </thead>
  <tbody>

<?php
        var_dump($_SESSION['panier']);
    
  echo "  <tr>
           <td>".$_SESSION['panier']['nomProd']."</td>
           <td>".$_SESSION['panier']['qteProd']."</td>
           <td>".$_SESSION['panier']['prixProd'].'€'."</td>
           <td></tr>";
?>
  </tbody>
</table>

<?php
// if (($_SESSION['status']) == 1) {

// echo"<a class='btn btn-primary' href='index.php?action=addProd'>Ajoutez un nouveau produit</a>";
// }
$content = ob_get_clean();
require "src/view/template.php";

