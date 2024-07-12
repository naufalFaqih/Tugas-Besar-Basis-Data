<?php
class Category_model {
    private $db;
    private $table = 'categories';

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllCategory() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getCategoryById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function tambahDataCategory($data)
    {
        $query = "INSERT INTO categories
                    VALUES
                  ('', :name)";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);

        $this->db->execute();

        return $this->db->rowCount();
    }}