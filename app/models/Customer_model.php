<?php

class Customer_model {
    private $db;
    private $table= 'customers';

    public function __construct() {
        $this->db = new Database;
    }

    public function getCustomerByEmail($email) {
        $this->db->query('SELECT * FROM customers WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function addCustomer($data) {
        $this->db->query("INSERT INTO $this->table (name, email, phone) VALUES (:name, :email, :phone)");
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('phone', $data['phone']);
        $this->db->execute();

        return $this->db->lastInsertId();
    }
}
