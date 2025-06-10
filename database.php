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

$candy = array();
$calls = array();
$refer = array();
$signature = array();
$misc = array();

foreach ($comments as $comment => $id) {
    if (str_contains($comment, 'candy')) {
        array_push($candy, $comment);
    } elseif (str_contains($comment, 'calls')) {
        array_push($calls, $comment);
    } elseif (str_contains($comment, 'refer')) {
        array_push($refer, $comment);
    } elseif (str_contains($comment, 'sign')) {
        array_push($signature, $comment);
    } else {
        array_push($misc, $comment);
    }
}

echo "Candy List <br>";
foreach ($candy as $comment) {
    echo "$comment <br>";
}
echo "Calls List <br>";
foreach ($calls as $comment) {
    echo "$comment <br>";
}
echo "Referrals List <br>";
foreach ($refer as $comment) {
    echo "$comment <br>";
}
echo "Signature List <br>";
foreach ($signature as $comment) {
    echo "$comment <br>";
}
echo "Misc. List <br>";
foreach ($misc as $comment) {
    echo "$comment <br>";
}
