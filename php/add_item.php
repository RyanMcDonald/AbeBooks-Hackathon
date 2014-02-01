<?php

// Grab post variables
$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$store_name = $_POST['store_name'];

echo $item_name . "\n" . $item_price . "\n" . $store_name . "\n";

$mysqli = new mysqli("nevrdb.cfpwtz0jnnuo.us-west-2.rds.amazonaws.com", "nevr", "Nevr242!", "nevr");

// Prepare to insert the item into the DB
if ( !($stmt = $mysqli->prepare("INSERT INTO items(name) VALUES (?)")) ) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

// Bind the parameters
if (!$stmt->bind_param("s", $item_name)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

// Execute the statement
$stmt->execute();

// Now associate the item with the price and store
if ( !($stmt = $mysqli->prepare("INSERT INTO is_in(store_id, item_id, price) VALUES (?, ?, ?)")) ) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$store_id = "SELECT id FROM stores WHERE name = " . $store_name;
$item_id = "SELECT id FROM items WHERE name = " . $item_name;

if (!$stmt->bind_param("iid", $store_id, $item_id, $item_price)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->execute();

?>
