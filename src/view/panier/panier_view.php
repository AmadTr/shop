<?php 
if(!session_status()){
    session_start();
}
// require "src/controller/cart_ctl.php";

ob_start();
$titre = 'Produits';
$total=0;

if (isset($_SESSION['panier'])) {

  echo '<h1>Votre Panier</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Produit</th>
        <th scope="col">Quantite</th>
        <th scope="col">Prix</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>';

  foreach ($_SESSION['panier'] as $key => $qte) {
         
    $prod = getProduit($key);

    echo "<tr>
          <td>".$prod->getName()."</td>
          <td><a class='btn btn-warning' href='index.php?action=qteMoins&id=".$key."'>-</a>
          ".$qte."
          <a class='btn btn-warning' href='index.php?action=qtePlus&id=".$key."'>+</a>
          </td>
          <td>".$prod->getUnit_price().' €'."</td>
          <td>".$qte*$prod->getUnit_price().' €'."</td>
          <td><a class='btn btn-danger' href='index.php?action=supProd&id=".$key."'>Supprimer</a></td>
          </tr>";
          $total += $qte*$prod->getUnit_price();
  }
          echo " <tr>
            <td colspan = '3'>Montant Total</td><td>$total €</td><td><a class='btn btn-danger' href='index.php?action=effPanier'>TOUT SUPPRIMER</a></td>
          </tr> 
      </tbody>
    </table>";
echo "<a class='btn btn-primary' href='index.php?action=validPanier'>Commander</a>";

}
else{
  echo "<h2>Votre Panier est vide</h2>
        <a class='btn btn-primary' href='index.php?action=showProds'>Liste des Produits</a>";
}

$content = ob_get_clean();
require "src/view/template.php";

