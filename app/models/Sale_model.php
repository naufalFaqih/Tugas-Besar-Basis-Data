<?php

class Sale_model {
    private $db;
    private $table = 'sales';

    public function __construct() {
        $this->db = new Database;
    }

    public function createSale($customer_id, $user_id, $total_amount) {
        $this->db->query('INSERT INTO sales (customer_id, user_id, total_amount, sale_date) VALUES (:customer_id, :user_id, :total_amount, NOW())');
        $this->db->bind(':customer_id', $customer_id);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':total_amount', $total_amount);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function addSaleItem($sale_id, $product_id, $quantity, $price) {
        $this->db->query('INSERT INTO sale_items (sale_id, product_id, quantity, price) VALUES (:sale_id, :product_id, :quantity, :price)');
        $this->db->bind(':sale_id', $sale_id);
        $this->db->bind(':product_id', $product_id);
        $this->db->bind(':quantity', $quantity);
        $this->db->bind(':price', $price);
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function getAllSales() {
        $this->db->query("SELECT s.*, c.name as customer_name, u.username as kasir_username FROM $this->table s
                          LEFT JOIN customers c ON s.customer_id = c.id
                          LEFT JOIN users u ON s.user_id = u.id");
        return $this->db->resultSet();
    }

    public function getSaleItems($sale_id) {
        $this->db->query("SELECT si.*, p.name as product_name FROM sale_items si
                          LEFT JOIN products p ON si.product_id = p.id
                          WHERE si.sale_id = :sale_id");
        $this->db->bind('sale_id', $sale_id);
        return $this->db->resultSet();
    }
}
