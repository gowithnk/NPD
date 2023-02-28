<?php
include_once('includes/config.php');
if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}

// MySQL query to retrieve all data from a table
$query = "SELECT * FROM tblnpd";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error: ' . mysqli_error($conn));
}

// Fetch all data from query result
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}


// Encode data in JSON format
$json_data = json_encode($data);

// Set HTTP response headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Allow cross-origin requests from any domain
header('Cache-Control: no-cache, no-store, must-revalidate'); // Prevent caching of API response
header('Pragma: no-cache'); // Prevent caching of API response in legacy HTTP 1.0 clients
header('Expires: 0'); // Prevent caching of API response in legacy HTTP 1.0 clients
header('X-Content-Type-Options: nosniff'); // Prevent MIME type sniffing
header('X-XSS-Protection: 1; mode=block'); // Enable XSS protection in modern browsers

// Output encoded JSON data
echo $json_data;
?>
