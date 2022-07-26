<?php    
    class Redirect {
        public function redirectTo($page) {
            header("Location: {$_SESSION['URL_APP']}{$page}");
        }
    }