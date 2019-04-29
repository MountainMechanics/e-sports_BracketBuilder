function addPlayerToDB(playername) {
    fetch("http://localhost/esports_BracketBuilder/create_player.php?name="+playername)
        .then(function(response) {
            return response.json();
        });
}