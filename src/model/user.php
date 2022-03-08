<?php

class User {
    private $id;
    private $name;
    private $firstname;
    private $email;
    private $password;
    private $statut_id;

    public function getId() {return $this->id;}
    
    public function getName() {return $this->name;}
    public function setName($name) {$this->name = $name;}

    public function getFirstName() {return $this->firstname;}
    public function setFirstName($firstname) {$this->firstname = $firstname;}

    public function getEmail() {return $this->email;}
    public function setEmail($email) {$this->email = $email;}

    public function getPassword() {return $this->password;}
    public function setPassword($password) {$this->password = $password;}

    public function getStatus_id() {return $this->status_id;}
    public function setStatus_id($status_id) {$this->status_id = $status_id;}
   
}


function addUser($name, $firstname, $email, $password, $status_id) {
    $rep=false;

    $sql = "INSERT INTO users (name, firstname, email, password, status_id) ";
    $sql .= "VALUES (:name, :firstname, :email, :password, :status_id)";

    try {
        $bdd = dbConnect();
        $req = $bdd->prepare($sql);

        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':firstname', $firstname, PDO::PARAM_INT);
        $req->bindValue(':email', $email, PDO::PARAM_INT);
        $req->bindValue(':password', $password, PDO::PARAM_INT);
        $req->bindValue(':status_id', $status_id, PDO::PARAM_STR);

        $rep = $req->execute();
    }
    catch (PDOException $ex) {
        var_dump("Erreur ADD USERS: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}

function getAllUser() {
    $sql = "SELECT * FROM users";
    $rep=[];

    try {
        $bdd = dbConnect();
        $req = $bdd->query($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'User');
        $rep = $req->fetchAll();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET USER: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}

function getUser($email) {
    $rep= false;

    $sql = "SELECT * FROM users WHERE email= :email";

    try {
        $bdd = dbConnect();
        $req = $bdd->prepare($sql);

        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->setFetchMode(PDO::FETCH_CLASS, 'User');
        $req->execute();
        $rep = $req->fetch();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET USER: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}

function updateUser($id, $name, $firstname, $email, $password, $status_id){

    $sql = "UPDATE users ";
    $sql .= "SET name= :name, firstname= :firstname, email= :email, password= :password status_id= :status_id ";
    $sql .= "WHERE id= :id;";
    $rep=false;

    try {
        $rep=true;

        $bdd = dbConnect();
        $req = $bdd->prepare($sql);

        $req->bindValue(':id', $id_prod, PDO::PARAM_INT);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':firstname', $firstname, PDO::PARAM_INT);
        $req->bindValue(':email', $email, PDO::PARAM_INT);
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->bindValue(':status_id', $status_id, PDO::PARAM_STR);

        $rep = $req->execute();
    }
    catch (PDOException $ex) {
        var_dump("Erreur UPDATE USER: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}

function deleteUserId($id) {
    $rep= false;
    $sql = "DELETE FROM users ";
    $sql .= "WHERE id= :id;";

    try {
        $bdd = dbConnect();
        $req = $bdd->prepare($sql);

        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $rep = $req->fetchAll();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET USER: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}