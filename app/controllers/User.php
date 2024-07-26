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

    public function purchases(){
        $data['judul'] = 'Search Results';
        $data['sale'] = $this->model('Sale_model')->getAllSales();
        $this->view('templates/header', $data);
        $this->view('user/purchases', $data);
        $this->view('templates/footer');
    }
   
    public function buy() {
        date_default_timezone_set('Asia/Jakarta');
        // Validasi input form
        if (!isset($_POST['product_id']) || !isset($_POST['quantity']) || !isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['phone'])) {
            Flasher::setFlash('Error', 'Missing data in the purchase form', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    
        // Ambil data dari form
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
    
        // Dapatkan detail produk
        $product = $this->model('Product_model')->getProductById($product_id);
        if (!$product) {
            Flasher::setFlash('Error', 'Product not found', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
        if (!$this->model('Product_model')->updateStock($product_id, $quantity)) {
            Flasher::setFlash('Error', 'Stok tidak mencukupi atau terjadi kesalahan saat memperbarui stok', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    
        $price = $product['price'];
        $total_amount = $price * $quantity;
    
        // Periksa apakah customer sudah ada
        $customer = $this->model('Customer_model')->getCustomerByEmail($email);
        if (!$customer) {
            $customer_id = $this->model('Customer_model')->addCustomer([
                'name' => $name,
                'email' => $email,
                'phone' => $phone
            ]);
        } else {
            $customer_id = $customer['id'];
        }
    
        // Generate unique code
        $unique_code = uniqid('PUR', false); // Example: PUR5f166b6d3f6e6
    
        // Tambahkan entri ke tabel sales
        $sale_id = $this->model('Sale_model')->addSale([
            'customer_id' => $customer_id,
            'total_amount' => $total_amount,
            'sale_date' => date('Y-m-d H:i:s'),
            'unique_code' => $unique_code
        ]);
    
        if (!$sale_id) {
            Flasher::setFlash('Error', 'Failed to add sale', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    
        // Tambahkan entri ke tabel sale_items
        $result = $this->model('Sale_model')->addSaleItem([
            'sale_id' => $sale_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'price' => $price
        ]);
    
        if ($result) {
            Flasher::setFlash('Sukses!', 'Pembelian Produk Berhasil, Silahkan Cek di Menu Pembelian', 'success');
        } else {
            Flasher::setFlash('Error', 'Failed to add sale item', 'danger');
        }
    
        header('Location: ' . BASEURL . '/user');
        exit;
    }

    public function purchaseDetail($code) {
        $data['judul'] = 'Purchase Detail';
        $data['sale'] = $this->model('Sale_model')->getSaleByUniqueCode($code);
        if (!$data['sale']) {
            Flasher::setFlash('Error', 'Purchase not found', 'danger');
            header('Location: ' . BASEURL . '/user/purchases');
            exit;
        }
        $data['items'] = $this->model('Sale_model')->getSaleItemsBySaleId($data['sale']['id']);
        $this->view('templates/header', $data);
        $this->view('user/purchaseDetail', $data);
        $this->view('templates/footer');
    }
    
   
  
}
