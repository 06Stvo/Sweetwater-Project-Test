<?php

// Create Array for comments and ids to be stored in
$comments = array();
// Created sorted arrays 
$candy = array();
$calls = array();
$refer = array();
$signature = array();
$misc = array();


function connectToDataBase()
{
    // Store database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "sweetwaterdb";
    $conn = "";

    // Connect to Database
    try {
        $conn = mysqli_connect($servername, $username, $password, $db_name);
        // Test Connection
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        echo "Connected!";
        return $conn;
    } catch (Exception $e) {
        echo "Exception caught when connecting to database :" . $e->getMessage();
    }
}

function queryData(&$conn, &$comments)
{
    try {
        // Query the database to retreive the comments and order ids
        $sql = "SELECT orderid, comments FROM sweetwater_test";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $comments[$row["comments"]] = $row["orderid"];
            }
        } else {
            echo "No Results";
        }
    } catch (Exception $e) {
        echo "Exception caught when querying to database :" . $e->getMessage();
    }
}

function sortComments($comments, $candy, $calls, $refer, $signature, $misc)
{
    // Sort the comments based on topic
    foreach ($comments as $comment => $id) {
        if (str_contains(strtolower($comment), 'candy')) {
            array_push($candy, $comment);
        } elseif (str_contains(strtolower($comment), 'call')) {
            array_push($calls, $comment);
        } elseif (str_contains(strtolower($comment), 'refer')) {
            array_push($refer, $comment);
        } elseif (str_contains(strtolower($comment), 'sign')) {
            array_push($signature, $comment);
        } else {
            array_push($misc, $comment);
        }
    }
}


function getList($topic, $candy, $calls, $refer, $signature, $misc)
{
    if ($topic == 'candy') {
        return $candy;
    } elseif ($topic == 'calls') {
        return $calls;
    } elseif ($topic == 'refer') {
        return $refer;
    } elseif ($topic == 'sign') {
        return $signature;
    } elseif ($topic == 'misc') {
        return $misc;
    }
}
function updateDate($comments, $conn)
{
    foreach ($comments as $comment => $id) {
        if (preg_match('(\d{2}/\d{2}/\d{2})', $comment, $str)) {
            $date = $str[0];
            $dateTime = DateTime::createFromFormat('m/d/y', $date);
            $newDate = $dateTime->format('Y-m-d H:i:s');
            global $conn;
            $updateSql = "UPDATE sweetwater_test SET shipdate_expected = '$newDate' WHERE orderid = $id";
            $updateResult = $conn->query($updateSql);
        }
    }
}
