<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bracket Builder</title>
    <link rel="stylesheet" href="css/basic.css"/>
</head>
<body>
    <form action="outcome.php" method="get">
        <label for="players">
            Players:<br>
            Replace Spaces in player names with underscores "_"
        </label>
        <br>
        <textarea name="playerNames" id="players" placeholder="Write your player names here. One per line"></textarea><br>
        <button type="submit">Send Data</button>
    </form>
<?php

?>
</body>
</html>