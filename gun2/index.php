<?php
/**
 * Smart User Access System
 * Qaydalar:
 * 1) Ban olunubsa -> dərhal deny
 * 2) Age < 18 -> deny
 * 3) Role əsaslı icazə:
 *    - admin -> Admin panel
 *    - moderator -> email verified olmalıdır
 *    - user -> balance >= 50 premium, yoxsa basic
 *    - guest -> read-only
 * 4) Naməlum rol -> Invalid role
 * Extra: Access granted olsa "Welcome..." yazdır
 */

// ---- GİRİŞ DƏYİŞƏNLƏRİ ----
$age = 20;
$role = "user";         
$balance = 45;           
$isBanned = false;
$isEmailVerified = true;

// ---- LOGIC ----
$message = "";
$granted = false;

// 1) Ban yoxlaması
if ($isBanned === true) {
    $message = "Access denied: You are banned.";
}
// 2) Yaş məhdudiyyəti
else if ($age < 18) {
    $message = "Access denied: Age restriction.";
}
// 3) Rol əsaslı icazə
else if ($role === "admin") {
    $message = "Access granted: Admin panel.";
    $granted = true;
}
else if ($role === "moderator") {
    if ($isEmailVerified === true) {
        $message = "Access granted: Moderator panel.";
        $granted = true;
    } else {
        $message = "Access denied: Email not verified.";
    }
}
else if ($role === "user") {
    if ($balance >= 50) {
        $message = "Access granted: User premium access.";
    } else {
        $message = "Access granted: User basic access.";
    }
    $granted = true;
}
else if ($role === "guest") {
    $message = "Access granted: Guest read-only access.";
    $granted = true;
}
// 4) Naməlum rol
else {
    $message = "Invalid role.";
}

// ---- OUTPUT ----
echo $message . PHP_EOL;

if ($granted === true) {
    echo "Welcome, have a nice day" . PHP_EOL;
}
