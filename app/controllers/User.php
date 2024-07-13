<?php

class User extends Controller {

    public function index() {
        $data['judul'] = 'Produk';
        $data['products'] = $this->model('Product_model')->getAllProducts();
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function search() {
        $data['judul'] = 'Search Results';
        $data['products'] = $this->model('Product_model')->searchProducts();
        $this->view('templates/header', $data);
        $this->view('user/search', $data);
        $this->view('templates/footer');
    }

    public function buy($product_id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $quantity = $_POST['quantity'];

            // Periksa apakah customer sudah ada
            $customer = $this->model('Customer_model')->getCustomerByEmail($email);
            if (!$customer) {
                $customer_id = $this->model('Customer_model')->createCustomer($name, $email, $phone);
            } else {
                $customer_id = $customer['id'];
            }

            // Ambil user id dari session
            $user_id = $_SESSION['user_id'];
            $product = $this->model('Product_model')->getProductById($product_id);
            $total_amount = $product['price'] * $quantity;

            // Buat sale
            $sale_id = $this->model('Sale_model')->createSale($customer_id, $user_id, $total_amount);

            // Tambah item ke sale
            $this->model('Sale_model')->addSaleItem($sale_id, $product_id, $quantity, $product['price']);

            // Kurangi stok produk
            $this->model('Product_model')->updateStock($product_id, $quantity);

            Flasher::setFlash('Berhasil', 'dibeli', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
  
}
