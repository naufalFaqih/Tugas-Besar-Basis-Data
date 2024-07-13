<?php

class Customer_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCustomerByEmail($email) {
        $this->db->query('SELECT * FROM customers WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function createCustomer($name, $email, $phone) {
        $this->db->query('INSERT INTO customers (name, email, phone) VALUES (:name, :email, :phone)');
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
