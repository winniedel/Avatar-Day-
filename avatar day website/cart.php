<?php
// This script displays the shopping cart

// Start the session
session_start();

// Array of product prices
$productPrices = array(
	'Kyoshi\'s boots' => 20,
	'Sokka\'s Detective Hat' => 15,
	'Village Leader\'s Hat' => 12,
	'Fire Nation Arm Band' => 8,
	'Parkas' => 30,
	'Aang\'s Sun hat' => 18,
	'Kyoshi\'s clothes' => 25,
	'Momo plushie' => 10,
	'Appa Plushie' => 25,
	'Elephant Rat Plushie' => 15,
	'Aang\'s Staff' => 30,
	'Sokka\'s monocle' => 12,
	'Kyoshi\'s Fan' => 18,
	'Sokka\'s boomerang' => 20,
	'Dragon bubble pipe' => 15,
	'Zuko\'s Oni mask' => 10,
	'Katara\'s water canteen' => 8,
	'Wheel of punishments' => 40,
	'Carriage' => 50,
	'Green lanterns' => 15,
	'Statue of Chin the Conquerer' => 35,
	'The Birth of Kyoshi Painting' => 30,
	'Uncle Iroh\'s Tea Set' => 20,
	'Kyoshi\'s boots (museum version)' => 45,
	'Chest of Gold' => 50,
	'Water Tribe Money' => 10,
	'Water Tribe scroll' => 8,
	'Map of the World' => 15,
	'Appa\'s Saddle' => 25
);

// Display the cart contents
echo '<h1>Shopping Cart</h1>';

$totalPrice = 0;

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
	echo '<p>Your cart is empty.</p>';
} else {
	echo '<ul>';
	foreach ($_SESSION['cart'] as $product) {
    	$price = $productPrices[$product] ?? 0;
    	echo '<li>' . $product . ' - $' . $price . ' - <a href="remove_from_cart.php?product=' . urlencode($product) . '">Remove</a></li>';
    	$totalPrice += $price;
	}
	echo '</ul>';
}

echo '<p>Total Price: $' . $totalPrice . '</p>';

// Checkout function
echo '<h2>Checkout</h2>';
echo '<a href="checkout.php">Proceed to Checkout</a>';

?>

<?php
// Get the price of a product dynamically
function getProductPrice($product) {
	// Replace this with your own logic to retrieve the price from a database or another reliable source
	$productPrices = array(
    	'Kyoshi\'s boots' => 20,
    	'Sokka\'s Detective Hat' => 15,
    	// ... Add other product prices here
	);

	return $productPrices[$product] ?? 0;
}
?>
