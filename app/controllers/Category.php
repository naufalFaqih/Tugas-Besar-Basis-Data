<?php
class Category extends Controller {
    public function index()
    {
        $data['judul'] = 'Category Page';
        $data['category']= $this->model('Category_model')->getAllCategory();
        $this->view('templates/header', $data);
        $this->view('Category/index', $data);
        $this->view('templates/footer');
    }

    public function create($id){
        $data['judul'] = 'Tambah Category';
        $data['category'] = $this->model('Category_model')->getCategoryById($id);
        $this->view('templates/header', $data);
        $this->view('Category/create', $data);
        $this->view('templates/footer');
    }


}