<?php

class Produit {
    private $id_prod;
    private $name;
    private $category_id;
    private $quantity;
    private $unit_price;

    public function getId_prod() {return $this->id_prod;}
    
    public function getName() {return $this->name;}
    public function setName($name) {$this->name = $name;}

    public function getCategory_id() {return $this->category_id;}
    public function setCategory_id($category_id) {$this->category_id = $category_id;}

    public function getQuantity() {return $this->quantity;}
    public function setQuantity($quantity) {$this->quantity = $quantity;}

    public function getUnit_price() {return $this->unit_price;}
    public function setUnit_price($unit_price) {$this->unit_price = $unit_price;}
   
}

// passer direct l objet de type produit
function addProduit($name, $category_id, $quantity, $unit_price) {
    $rep=false;

    $sql = "INSERT INTO products (name, category_id, quantity, unit_price) ";
    $sql .= "VALUES (:name, :category_id, :quantity, :unit_price)";

    try {
        $bdd = dbConnect();
        $req = $bdd->prepare($sql);

        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $req->bindValue(':quantity', $quantity, PDO::PARAM_INT);
        $req->bindValue(':unit_price', $unit_price, PDO::PARAM_STR);

        $rep = $req->execute();
    }
    catch (PDOException $ex) {
        var_dump("Erreur ADD PRODUIT: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}

function getAllProduits() {
    $sql = "SELECT * FROM products";
    $rep=[];

    try {
        $bdd = dbConnect();
        $req = $bdd->query($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Produit');
        $rep = $req->fetchAll();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET PRODUIT: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}

function getProduit($id) {
    $rep= false;

    $sql = "SELECT * FROM products WHERE id_prod= :id";

    try {
        $bdd = dbConnect();
        $req = $bdd->prepare($sql);

        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Produit');
        $req->execute();
        $rep = $req->fetch();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET PRODUIT: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}

function updateProduit($id_prod, $name, $category_id, $quantity, $unit_price){

    $sql = "UPDATE products ";
    $sql .= "SET name= :name, category_id= :category_id, quantity= :quantity, unit_price= :unit_price ";
    $sql .= "WHERE id_prod= :id;";
    $rep=false;

    try {
        $rep=true;

        $bdd = dbConnect();
        $req = $bdd->prepare($sql);

        $req->bindValue(':id', $id_prod, PDO::PARAM_INT);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $req->bindValue(':quantity', $quantity, PDO::PARAM_INT);
        $req->bindValue(':unit_price', $unit_price, PDO::PARAM_STR);

        $rep = $req->execute();
    }
    catch (PDOException $ex) {
        var_dump("Erreur UPDATE PRODUIT: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}

function deleteProduitById($id) {
    $rep= false;
    $sql = "DELETE FROM products ";
    $sql .= "WHERE id_prod= :id;";

    try {
        $bdd = dbConnect();
        $req = $bdd->prepare($sql);

        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $rep = $req->fetchAll();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET PRODUIT: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}