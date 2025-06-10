<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "sweetwaterdb";
$conn = "";

$conn = mysqli_connect($servername, $username, $password, $db_name);


if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

echo "Connected!" . "<br>";

$sql = "SELECT orderid, comments FROM sweetwater_test";
$result = $conn->query($sql);
$comments = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $comments[$row["comments"]] = $row["orderid"];
    }
} else {
    echo "No Results";
}

foreach ($comments as $comment => $id) {
    echo "$comment: $id <br>";
}
