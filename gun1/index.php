<?php
session_start();

include_once 'form.php';

$submitted = ($_SERVER['REQUEST_METHOD'] === 'POST');

// Təhlükəsiz input (kiçik əlavə yaxşılıq)
$name = htmlspecialchars(trim($_POST['username'] ?? ''), ENT_QUOTES, 'UTF-8');
$password = trim($_POST['password'] ?? '');

// 3) Login cəhdlərini limitləmək üçün session-da sayğac
if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
}

// Əgər 3 və daha çox cəhd edibsə, blokla
if ($_SESSION['attempts'] >= 3) {
    echo "Too many attempts. Please try again later.";
    exit;
}

if ($submitted) {
    if (!empty($name) && !empty($password)) {

        // 1) password_hash/password_verify (şifrə hardcoded olsa da, yoxlama bu üsulla)
        $storedHash = password_hash('pas123', PASSWORD_DEFAULT);

        if (password_verify($password, $storedHash)) {

            // 2) Session istifadə etmək (login oldu -> user session-a yaz)
            $_SESSION['user'] = $name;

            // uğurlu login -> attempts sıfırlansın
            $_SESSION['attempts'] = 0;

            echo "Login successful! Welcome, " . $_SESSION['user'] . ".";


        } else {
            // 3) Səhv login -> attempts artır
            $_SESSION['attempts']++;
            echo "Invalid username or password. Attempts: " . $_SESSION['attempts'] . "/3";
        }

    } else {
        echo "Please fill in all required fields.";
    }
}
