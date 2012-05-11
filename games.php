<?php
include('config.php');

$checkgames = mysql_query("SELECT `current` FROM `games`") or die(mysql_error());
$games = mysql_fetch_array($checkgames);

echo $games['current'];

?>