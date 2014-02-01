<?php

$connection = mysqli_connect("nevrdb.cfpwtz0jnnuo.us-west-2.rds.amazonaws.com", "nevr", "Nevr242!", "nevr");

$result = $connection->query("SELECT * FROM items");

while ($row = $result->fetch_assoc()) {
	echo "Name: " . $row['name'] . ", Category: " . $row['category'];
}



?>
