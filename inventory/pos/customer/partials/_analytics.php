<?php
$query = "SELECT COUNT(*) FROM `customers` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($customers);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*) FROM `orders` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($orders);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*) FROM `products` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($products);
$stmt->fetch();
$stmt->close();

$query = "SELECT SUM(pay_amt) FROM `payments` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($sales);
$stmt->fetch();
$stmt->close();
