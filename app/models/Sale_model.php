<?php

class Sale_model {
    private $db;
    private $table = 'sales';

    public function __construct() {
        $this->db = new Database;
    }

    public function addSale($data) {
        $this->db->query("INSERT INTO $this->table (unique_code,customer_id, total_amount, sale_date) VALUES (:unique_code  ,:customer_id, :total_amount, :sale_date)");
        $this->db->bind('unique_code', $data['unique_code']);
        $this->db->bind('customer_id', $data['customer_id']);
        $this->db->bind('total_amount', $data['total_amount']);
        $this->db->bind('sale_date', $data['sale_date']);
        $this->db->execute();

        return $this->db->lastInsertId();
    }


    public function addSaleItem($data) {
        $this->db->query("INSERT INTO sale_items (sale_id, product_id, quantity, price) VALUES (:sale_id, :product_id, :quantity, :price)");
        $this->db->bind('sale_id', $data['sale_id']);
        $this->db->bind('product_id', $data['product_id']);
        $this->db->bind('quantity', $data['quantity']);
        $this->db->bind('price', $data['price']);
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function getAllSales() {
        $this->db->query("SELECT s.*, c.name as customer_name, c.email as customer_email FROM $this->table s
                          LEFT JOIN customers c ON s.customer_id = c.id");
        return $this->db->resultSet();
    }

    public function getSaleItems($sale_id) {
        $this->db->query("SELECT si.*, p.name as product_name FROM sale_items si
                          LEFT JOIN products p ON si.product_id = p.id
                          WHERE si.sale_id = :sale_id");
        $this->db->bind('sale_id', $sale_id);
        return $this->db->resultSet();
    }

    public function getSalesByUserId($userId) {
        $this->db->query("SELECT * FROM $this->table WHERE user_id = :user_id");
        $this->db->bind('user_id', $userId);
        return $this->db->resultSet();
    }

    public function getSaleById($id) {
        $this->db->query("SELECT * FROM $this->table WHERE id = :sale_id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getSaleItemsBySaleId($saleId) {
        $this->db->query("SELECT si.*, p.name as product_name, p.image as product_image FROM sale_items si JOIN products p ON si.product_id = p.id WHERE si.sale_id = :sale_id");
        $this->db->bind('sale_id', $saleId);
        return $this->db->resultSet();
    }
    
    public function getSaleByUniqueCode($code) {
        $this->db->query("SELECT * FROM $this->table WHERE unique_code = :code");
        $this->db->bind('code', $code);
        return $this->db->single();
    }
   


}


