<?php
// This script handles the checkout process

// Start the session
session_start();

// Check if the cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
	echo '<p>Your cart is empty. Please add some items before proceeding to checkout.</p>';
	exit;
}

// Process the checkout and clear the cart
$totalPrice = 0;
$items = '';

foreach ($_SESSION['cart'] as $product) {
	$price = getProductPrice($product); // Retrieve price dynamically
	$totalPrice += $price;
	$items .= $product . ' - $' . $price . '<br>';
}

// Clear the cart
$_SESSION['cart'] = array();

// Send thank you email
sendThankYouEmail($items, $totalPrice);

// Display thank you message
echo '<h1>Thank You!</h1>';
echo '<p>Your order has been placed successfully. We appreciate your business.</p>';
echo '<p>Order details:</p>';
echo $items;
echo '<p>Total Price: $' . $totalPrice . '</p>';

// Function to retrieve the price of a product dynamically
function getProductPrice($product) {
	// Replace this with your own logic to retrieve the price from a database or another reliable source
	$productPrices = array(
    	'Kyoshi\'s boots' => 20,
    	'Sokka\'s Detective Hat' => 15,
    	// ... Add other product prices here
	);

	return $productPrices[$product] ?? 0;
}

// Function to send a thank you email
function sendThankYouEmail($items, $totalPrice) {
	// Replace this with your own logic to send the email
	$to = 'customer@example.com';
	$subject = 'Thank You for Your Order';
	$message = 'Thank you for your order! Here are the details:<br><br>' . $items . '<br>Total Price: $' . $totalPrice;
	$headers = 'From: your_email@example.com' . "\r\n" .
    	'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";

	// Uncomment the line below to send the email
	// mail($to, $subject, $message, $headers);
}
?>
