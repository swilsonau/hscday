<?php
include('config.php');

$name = mysql_real_escape_string($_POST['name']);
$games = mysql_real_escape_string($_POST['games']);

// Make sure they have a name
if(empty($name)) {
  echo "Please enter a name.";
}

// Check for available computers
$computerchecksql = mysql_query("SELECT `id`, `status` FROM `computers` WHERE `status` = '1'") or die(mysql_error());
if(mysql_num_rows($computerchecksql) == 0) {
  echo "There are no computers available.";
} else {
  // There are computers available
  $computersql = mysql_query("SELECT `id`, `status` FROM `computers` WHERE `status` = '1' LIMIT 1") or die(mysql_error());
  $computer = mysql_fetch_array($computersql);
  
  $computerid = $computer['id'];
  
  // Insert the user into the database
  $usersql = mysql_query("INSERT INTO `bookings`(`computer`, `name`, `games`, `status`)VALUES('$computerid', '$name', '$games', '1')") or die(mysql_error());
  
  // Mark computer as active
  $compacsql = mysql_query("UPDATE `computers` SET `status` = '2' WHERE `id` = '$computerid'") or die(mysql_error());
  
  // Finished
  echo "Computer Booked. <strong>Number: #$computerid</strong>";
}
?>