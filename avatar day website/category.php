<?php
// This script displays the products in a specific category

// Array of products with prices
$products = array(
	'clothes' => array(
    	array('Kyoshi\'s boots', rand(10, 50)),
    	array('Sokka\'s Detective Hat', rand(10, 50)),
    	array('Village Leader\'s Hat', rand(10, 50)),
    	array('Fire Nation Arm Band', rand(10, 50)),
    	array('Parkas', rand(10, 50)),
    	array('Aang\'s Sun hat', rand(10, 50)),
    	array('Kyoshi\'s clothes', rand(10, 50))
	),
	'toys' => array(
    	array('Momo plushie', rand(10, 50)),
    	array('Appa Plushie', rand(10, 50)),
    	array('Elephant Rat Plushie', rand(10, 50))
	),
	'accessories' => array(
    	array('Aang\'s Staff', rand(10, 50)),
    	array('Sokka\'s monocle', rand(10, 50)),
    	array('Kyoshi\'s Fan', rand(10, 50)),
    	array('Sokka\'s boomerang', rand(10, 50)),
    	array('Dragon bubble pipe', rand(10, 50)),
    	array('Zuko\'s Oni mask', rand(10, 50)),
    	array('Katara\'s water canteen', rand(10, 50))
	),
	'decoration' => array(
    	array('Wheel of punishments', rand(10, 50)),
    	array('Carriage', rand(10, 50)),
    	array('Green lanterns', rand(10, 50)),
    	array('Statue of Chin the Conquerer', rand(10, 50)),
    	array('The Birth of Kyoshi Painting', rand(10, 50)),
    	array('Uncle Iroh\'s Tea Set', rand(10, 50)),
    	array('Kyoshi\'s boots (museum version)', rand(10, 50))
	),
	'miscellaneous' => array(
    	array('Chest of Gold', rand(10, 50)),
    	array('Water Tribe Money', rand(10, 50)),
    	array('Water Tribe scroll', rand(10, 50)),
    	array('Map of the World', rand(10, 50)),
    	array('Appa\'s Saddle', rand(10, 50))
	)
);

// Get the category from the URL parameter
$category = $_GET['category'];

// Check if the category is valid
if (!array_key_exists($category, $products)) {
	echo 'Invalid category';
	exit;
}

// Display the products in the category
echo '<h1>' . ucfirst($category) . '</h1>';
echo '<ul>';
foreach ($products[$category] as $product) {
	echo '<li>' . $product[0] . ' - $' . $product[1] . ' - <a href="add_to_cart.php?product=' . urlencode($product[0]) . '">Add to Cart</a></li>';
}
echo '</ul>';
?>
