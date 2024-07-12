<?php

class Flasher {
    public static function setFlash($message, $action, $type) {
        $_SESSION['flash'] = [
            'message' => $message,
            'action' => $action,
            'type' => $type
        ];
    }

    public static function flash() {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert"> 
                    ' . $_SESSION['flash']['message'] . ' <strong>' . $_SESSION['flash']['action'] . '</strong>
                   
                  </div>';
            unset($_SESSION['flash']);
        }
    }
}
?>
