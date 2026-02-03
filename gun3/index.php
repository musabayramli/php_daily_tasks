<?php
/**
 * Day 3 Task Solution - Smart Order & Discount System
 * Requirements:
 * - switch-case for user type discount
 * - coupon logic
 * - max discount cap (50%)
 * - final checks + detailed output
 */

// ---- INPUTS ----
$userType = "vip";          // vip, regular, guest
$orderAmount = 120;         // order amount
$hasCoupon = true;          // has coupon?
$couponCode = "SALE20";     // SALE10, SALE20, INVALID

// ---- VARIABLES ----
$baseDiscount = 0;          // user type discount %
$couponDiscount = 0;        // coupon discount %
$totalDiscount = 0;         // total discount %
$statusMessage = "";
$errors = [];

// 1) User type discount (switch-case)
switch ($userType) {
    case "vip":
        $baseDiscount = 20;
        break;

    case "regular":
        $baseDiscount = 10;
        break;

    case "guest":
        $baseDiscount = 0;
        break;

    default:
        echo "Invalid user type" . PHP_EOL;
        exit; // stop program
}

// 2) Coupon logic
if ($hasCoupon === true) {
    if ($couponCode === "SALE10") {
        $couponDiscount = 10;
    } else if ($couponCode === "SALE20") {
        $couponDiscount = 20;
    } else {
        $couponDiscount = 0;
        $errors[] = "Invalid coupon code";
    }
}

// 3) Max discount cap
$totalDiscount = $baseDiscount + $couponDiscount;
if ($totalDiscount > 50) {
    $totalDiscount = 50;
}

// 4) Final price calculation
$discountAmount = ($orderAmount * $totalDiscount) / 100;
$finalAmount = $orderAmount - $discountAmount;

// 5) Final status check
if ($finalAmount < 50) {
    $statusMessage = "Minimum order limit not reached";
} else {
    $statusMessage = "Order confirmed";
}

// ---- OUTPUT ----
echo "User type: " . $userType . PHP_EOL;
echo "Initial amount: " . $orderAmount . PHP_EOL;
echo "Base discount (%): " . $baseDiscount . PHP_EOL;
echo "Coupon discount (%): " . $couponDiscount . PHP_EOL;
echo "Total discount (%): " . $totalDiscount . PHP_EOL;
echo "Discount amount: " . $discountAmount . PHP_EOL;
echo "Final amount: " . $finalAmount . PHP_EOL;

if (!empty($errors)) {
    echo "Warnings:" . PHP_EOL;
    foreach ($errors as $err) {
        echo "- " . $err . PHP_EOL;
    }
}

echo "Status: " . $statusMessage . PHP_EOL;
?>
