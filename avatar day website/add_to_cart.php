<?php
// This script adds a product to the shopping cart

// Start the session
session_start();

// Get the product and quantity from the URL parameters
$product = urldecode($_GET['product']);
$quantity = $_GET['quantity'] ?? 1;

// Initialize the cart array if it doesn't exist
if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

// Add the product to the cart with the specified quantity
for ($i = 0; $i < $quantity; $i++) {
	$_SESSION['cart'][] = $product;
}

// Redirect back to the previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>
