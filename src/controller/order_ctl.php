<?php

require "src/model/order.php";

if(!session_status()){
    session_start();
}

function addCmd(){

    // addOrder(){
        var_dump($_SESSION['id']);

        var_dump($_SESSION['panier']);

        die();
    // }
}