<?php

class Sales extends Controller {
    public function index() {
        $data['judul'] = 'Hasil Pembelian';
        $data['sales'] = $this->model('Sale_model')->getAllSales();
        
        foreach ($data['sales'] as &$sale) {
            $sale['items'] = $this->model('Sale_model')->getSaleItems($sale['id']);
        }

        $this->view('templates/header', $data);
        $this->view('sales/index', $data);
        $this->view('templates/footer');
    }
}
