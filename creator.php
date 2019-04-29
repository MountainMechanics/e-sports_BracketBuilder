<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bracket Builder</title>
    <link rel="stylesheet" href="css/basic.css"/>
    <link rel="stylesheet" href="css/form.css"/>
</head>
<body class="font-basic allContent">
    <form action="outcome.php" method="get">
        <label for="players">
            <span class="font-header">Players:</span><br>
            Replace Spaces in player names with underscores "_"
        </label>
        <br>
        <textarea name="playerNames" id="players" placeholder="Write your player names here. One per line"></textarea><br>
        <button type="submit" class="btn-submit">Send Data</button>
    </form>
</body>
</html>