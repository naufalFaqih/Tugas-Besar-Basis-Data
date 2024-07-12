<?php
class Product extends Controller {
    public function index()
    {
        $data['judul'] = 'Produk Page';
        $data['products']= $this->model('Product_model')->getAllProducts();
        $this->view('templates/header', $data);
        Flasher::flash(); // Menampilkan notifikasi
        $this->view('Product/index', $data);
        $this->view('templates/footer');
    }

    public function create() {
        $data['judul'] = 'Tambah Product';
        $data['categories'] = $this->model('Category_model')->getAllCategory();
        $this->view('templates/header', $data);
        $this->view('Product/create', $data);
        $this->view('templates/footer');
    }

    public function edit($id) {
        $data['judul'] = 'Edit Product';
        $data['products'] = $this->model('Product_model')->getProductById($id);
        $data['categories'] = $this->model('Category_model') -> getAllCategory();
        $this->view('templates/header', $data);
        $this->view('Product/edit', $data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $category_id = $_POST['category_id'];

            $image = $this->uploadImage();

            $result = $this->model('Product_model')->createProduct($name, $description, $price, $stock, $category_id, $image);
            if ($result) {
                Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/Product');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/Product');
                exit;
            }
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Product_model')->getProductById($_POST['id']));
    }

    public function update($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $category_id = $_POST['category_id'];
            $image = $this->uploadImage();
    

            $result = $this->model('Product_model')->updateProduct($id, $name, $description, $price, $stock, $category_id, $image);
            if ($result) {
                Flasher::setFlash('Berhasil', 'diperbarui', 'success');
                header('Location: ' . BASEURL . '/Product');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'diperbarui', 'danger');
                header('Location: ' . BASEURL . '/Product');
                exit;
            }
        }
    }
    private function uploadImage() {
        if (!empty($_FILES['image']['name'])) {
            $targetDir = "img/"; // Directory to store uploaded images
            $targetFile = $targetDir . basename($_FILES["image"]["name"]); // Full path for the file

            // Ensure target directory exists
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                return $targetFile; // Return the relative path to the image
            } else {
                return null; // Return null if file upload fails
            }
        }
        return null; // Return null if no file is uploaded
    }

    public function delete($id) {
        if ($this->model('Product_model')->deleteProduct($id)) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/product');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/product');
            exit;
        }
    }
    
}


