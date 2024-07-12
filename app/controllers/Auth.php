<?php

class Auth extends Controller {
    public function index() {
        $data['judul'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('Auth/index');
        $this->view('templates/footer');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = ($_POST['password']); // Gunakan hash yang lebih aman seperti password_hash

            $user = $this->model('User_model')->getUserByUsername($username);

            if ($user && $user['password'] == $password) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                Flasher::setFlash('Berhasil', 'login', 'success');
                header('Location: ' . BASEURL . '/Product');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'login', 'danger');
                header('Location: ' . BASEURL . '/Auth');
                exit;
            }
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: ' . BASEURL . '/Auth');
        exit;
    }
}
