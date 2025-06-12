<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweetwater Project</title>
</head>

<body>
    <h2> Welcome! </h2>
    <p>Connect to DataBase: </p>
    <form method="post">
        <input type="submit" name="connect" class="button" value="connectDB" />
    </form>
    <p> Below is a filter to sort comments based on their topic. </p>
    <form action="index.php" method='get'>
        <label for="topic"> Choose a Filter: </label>
        <select name="topic">
            <option value="candy"> Candy </option>
            <option value="refer"> Referrals </option>
            <option value="calls"> Calls </option>
            <option value="sign"> Signature </option>
            <option value="misc"> Misc. </option>
        </select>
        <input type="submit" value="Submit">
    </form>

</html>

<?php
include 'database.php';

$conn = NULL;
if (array_key_exists('connect', $_POST)) {
    $conn = connectToDataBase();
}

$topic = $_GET["topic"];
$list = getList($topic, $candy, $calls, $refer, $signature, $misc);

foreach ($list as $comment) {
    echo $comment . "<br>";
}

updateDate($comments, $candy, $calls, $refer, $signature, $misc);
?>