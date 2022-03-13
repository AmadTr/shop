<?php

class Oders {
    private $id;
    private $customer_id;
    private $ref_cde;
    private $date;

    public function getId() {return $this->id;}
    
    public function getCustomer_id() {return $this->customer_id;}
    public function setCustomer_id($customer_id) {$this->customer_id = $customer_id;}

    public function getRef_cde() {return $this->ref_cde;}
    public function setRef_cde($ref_cde) {$this->ref_cde = $ref_cde;}

    public function getDate() {return $this->date;}
    public function setDate($date) {$this->date = $date;}
}

class Oder_lines {
    private $id;
    private $order_id;
    private $product_id;
    private $quantity;

    public function getId() {return $this->id;}
    
    public function getOrder_id() {return $this->order_id;}
    public function setOrder_id($order_id) {$this->order_id = $order_id;}

    public function getProduct_id() {return $this->product_id;}
    public function setProduct_id($product_id) {$this->product_id = $product_id;}

    public function getQuantity() {return $this->quantity;}
    public function setQuantity($quantity) {$this->quantity = $quantity;}
}