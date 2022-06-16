<?php

function is_login() {
    return isset($_SESSION['id']) && !empty($_SESSION['id']);
}
?>