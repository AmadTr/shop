<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title><?= $titre ?></title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
<?php 
if (isset($_SESSION['status'])) {
    echo'  <a class="navbar-brand" href="#">Bienvenue '.$_SESSION["firstname"].'</a>';
}    
?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?action=home">Accueil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=showProds">PRODUIT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=panier">PANIER</a>
                    </li>  
 <?php  
session_status();

    if (isset($_SESSION['status'])) {
        
        
        if (($_SESSION['status']) == 1) {
            
            echo "<li class='nav-item'>
            <a class='nav-link' href='index.php?action=showCats'>CATEGORIE</a>
            </li>";
        }
        
        echo "<li class='nav-item'>
            <a class='nav-link' href='index.php?action=logout'>DECONNEXION</a>
        </li>"; 

    }

    else{
            echo '<li class="nav-item">
            <a class="nav-link" href="index.php?action=login">CONNEXION</a>
            </li>';
    }                
?>
</ul>
</div>
</div>
    </nav>

<?= $content ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright :
    <a class="text-dark" href="https://mdbootstrap.com/">Amadou Traore amadtraore.pro@gmail.com</a>
  </div>
  <!-- Copyright -->
</footer>
</html>