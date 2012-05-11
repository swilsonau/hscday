<?php
include('config.php');

switch($_POST['action']) {
  default:
    die();
  break;
  
  case "start":
    $checkgames = mysql_query("SELECT `current` FROM `games`") or die(mysql_error());
    $games = mysql_fetch_array($checkgames);

    $game = $games['current'];
    $new = $game + 1;
    
    // Update
    $compacsql = mysql_query("UPDATE `games` SET `current` = '$new'") or die(mysql_error());
  break;
  
  case "end":
  // Time to loop through the players and minus 1
  
  $playerssql = mysql_query("SELECT `id`, `games`, `status` FROM `bookings` WHERE `status` = '1'") or die(mysql_error());
  while($players = mysql_fetch_array($playerssql)) {
    $gamecount = $players['games'] - 1;
    
    $id = $players['id'];
    
    // Update
    $compacsql = mysql_query("UPDATE `bookings` SET `games` = '$gamecount' WHERE `id` = '$id'") or die(mysql_error());
  }
  
  break;
  
  case "clear":
  // Deactive the players who have finished and open the computers to bookings
  
  $playerssql = mysql_query("SELECT `id`, `computer`, `games`, `status` FROM `bookings` WHERE `status` = '1' AND `games` = '0'") or die(mysql_error());
  while($players = mysql_fetch_array($playerssql)) {
    $id = $players['id'];
    $cid = $players['computer'];
    
    // Update Bookings
    $compacsql = mysql_query("UPDATE `bookings` SET `status` = '0' WHERE `id` = '$id'") or die(mysql_error());
    
    // Update COmputers
    $compacsql = mysql_query("UPDATE `computers` SET `status` = '1' WHERE `id` = '$cid'") or die(mysql_error());
  }
  
  break;
}