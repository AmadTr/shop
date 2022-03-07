<?php
// require "model/dbaccess.php";
// namespace Shop;

class Categorie {
    private $id;
    private $nom;

    public function getId() {return $this->id;}
    
    public function getName() {return $this->name;}
    public function setName($name) {$this->name = $name;}
}

function addCategorie($name) {
    $sql = "INSERT INTO categories(name) ";
    $sql .= "VALUES (:name)";
    $rep=false;

    try {
        $bdd = dbConnect();
        $req = $bdd->prepare($sql);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $rep = $req->execute();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET CATEGORIE: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}

function getAllCategories(){
    $sql = "SELECT * FROM categories";
    $rep=[];

    try {
        $bdd = dbConnect();
        $req = $bdd->query($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Categorie');
        $rep = $req->fetchAll();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET CATEGORIE: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}
//faire requete preparer
function getCategorie($id) {
    $rep= false;
    $sql = "SELECT * FROM categories WHERE id= :id";

    try {
        $bdd = dbConnect();
        $req = $bdd->prepare($sql);
        
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Categorie');
        $req->execute();
        $rep = $req->fetch();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET CATEGORIE: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}

function updateCategorie($id,$name){

    $sql = "UPDATE categories ";
    $sql .= "SET name= :name ";
    $sql .= "WHERE id= :id;";
    $rep=false;

    try {
        $rep=true;
        $bdd = dbConnect();
        $req = $bdd->prepare($sql);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $ret = $req->execute();
    }
    catch (PDOException $ex) {
        var_dump("Erreur UPDATE CATEGORIE: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}
//faire requete preparer

function deleteCategorieById($id) {
    $sql = "DELETE FROM categories ";
    $sql .= "WHERE id= :id;";
    $rep= false;

    try {
        $bdd = dbConnect();
        $req = $bdd->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $rep = $req->fetchAll();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET COURS: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}