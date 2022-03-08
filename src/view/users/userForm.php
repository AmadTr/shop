<?php
ob_start();
$titre = 'Connexion'
?>


<body>
  
    <h1>PAGE DE CONNEXION</h1>

<form action="index.php?action=valid" method="post">
 
        <div class="form-floating mb-3" > 
            <input type="email" class="form-control" id="email" name="email" placeholder="E-MAIL" value=>
        <label for="email">Email</label>
    </div>

    <div class="form-floating mb-3" > 
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value=>
        <label for="password">Password</label>

    </div>
    <button type="submit" class="btn btn-primary">Valide</button>

</form>

<?php
echo"<a class='btn btn-primary' href='index.php?action=addProd'>Creer un votre compte</a>";

$content = ob_get_clean();
require "src/view/template.php";
?>