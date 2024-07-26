<?php
class Product_model {
    private $db;
    private $table = 'products';

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllProducts() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getProductById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
  public function createProduct($name, $description, $price, $stock, $category_id, $image) {
            $this->db->query("INSERT INTO products (name, description, price, stock, category_id, image) VALUES (:name, :description, :price, :stock, :category_id, :image)");
            $this->db->bind(':name', $name);
            $this->db->bind(':description', $description);
            $this->db->bind(':price', $price);
            $this->db->bind(':stock', $stock);
            $this->db->bind(':category_id', $category_id);
            $this->db->bind(':image', $image);
            $this->db->execute();
            return $this->db->rowCount();
    }
    public function updateProduct($id, $name, $description, $price, $stock, $category_id, $image) {
        $this->db->query("UPDATE products SET name = :name, description = :description, price = :price, stock = :stock, category_id = :category_id, image = :image WHERE id = :id");
        $this->db->bind(':name', $name);
        $this->db->bind(':description', $description);
        $this->db->bind(':price', $price);
        $this->db->bind(':stock', $stock);
        $this->db->bind(':category_id', $category_id);
        $this->db->bind(':image', $image);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteProduct($id) {
        $this->db->query("DELETE FROM products WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
         return $this->db->rowCount();
    }
    public function getStockById($id) {
        $this->db->query("SELECT stock FROM $this->table WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single()['stock'];
    }
    public function updateStock($id, $quantity) {
        // Dapatkan stok terkini
        $currentStock = $this->getStockById($id);

        // Periksa apakah stok cukup
        if ($currentStock < $quantity) {
            return false;
        }

        // Perbarui stok
        $this->db->query("UPDATE $this->table SET stock = stock - :quantity WHERE id = :id");
        $this->db->bind('quantity', $quantity);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function searchProducts() {
       
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM products WHERE name LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}

