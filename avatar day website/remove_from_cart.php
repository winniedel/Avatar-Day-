<?php
// This script removes a product from the shopping cart

// Start the session
session_start();

// Get the product from the URL parameter
$product = urldecode($_GET['product']);

// Find the product in the cart and remove it
$index = array_search($product, $_SESSION['cart']);
if ($index !== false) {
	unset($_SESSION['cart'][$index]);
}

// Redirect back to the previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>
