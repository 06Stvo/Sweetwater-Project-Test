<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweetwater Project</title>
</head>

<body>
    <h2> Welcome! </h2>
    <p> Below is a text area that you can filter comments by what they are discussing. </p>
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

$topic = $_GET["topic"];
$list = getList($topic);

foreach ($list as $comment) {
    echo $comment . "<br>";
}
?>