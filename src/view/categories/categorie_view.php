<?php
ob_start();
$titre = 'Categories'
?>
<h1>Votre liste des Categories</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
    </tr>
  </thead>
  <tbody>

<?php

foreach ($categories as $c){
  echo "  <tr>
           <td>".$c->getId()."</td>
           <td>".$c->getName()."</td>
           <td>
            <a class='btn btn-warning' href='index.php?action=modifCat&id=".$c->getId()."'>Modifier</a>
            <a class='btn btn-danger' href='index.php?action=delCat&id=".$c->getId()."'>Supprimer</a>
            </td>
    </tr>";
}
?>
  </tbody>
</table>

<?php
echo"<a class='btn btn-primary' href='index.php?action=addCat'>Ajoutez une nouvelle categorie</a>";

$content = ob_get_clean();
require "src/view/template.php";
?>
