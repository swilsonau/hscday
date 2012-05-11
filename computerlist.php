<?php
include("config.php");

$computerlistsql = mysql_query("SELECT `id`, `status` FROM `computers`") or die(mysql_error());
echo '
<table name="computertable" border="0" width="100%" height="750">
  <tr style="font-weight: bold;">
    <td width="10%">ID</td>
    <td>Name</td>
  </tr>
';
while($computerlist = mysql_fetch_array($computerlistsql)) {
  switch($computerlist['status']) {
    default:
      echo '
        <tr style="background: #a2ff85">
          <td>#'.$computerlist['id'].'</td>
          <td>Computer Available! Book Now.</td>
        </tr>
      ';
    break;
    
    case "2":
       // Get the current user
       $gamessql = mysql_query("SELECT `id`, `computer`, `name`, `games`, `status` FROM `bookings` WHERE `computer` = '$computerlist[id]' AND `status` = '1' LIMIT 1") or die(mysql_error());
       $games = mysql_fetch_array($gamessql);
       
       if($games['games'] >= 2) {
          echo '
            <tr>
              <td>#'.$computerlist['id'].'</td>
              <td>'.$games['name'].' - Remaining Games: '.$games['games'].'</td>
            </tr>
          ';
        }elseif($games['games'] == 1) {
          echo '
            <tr style="background: #eda700;">
              <td>#'.$computerlist['id'].'</td>
              <td>'.$games['name'].' - Last Round</td>
            </tr>
          ';
        }elseif($games['games'] == 0) {
          echo '
            <tr style="background: red;">
              <td>#'.$computerlist['id'].'</td>
              <td>'.$games['name'].' - YOUR GAME IS NOW FINISHED.</td>
            </tr>
          ';
        }
    break;
    
    case "3":
      echo '
        <tr style="background: #9c9c9c">
          <td>#'.$computerlist['id'].'</td>
          <td>This computer is out of order</td>
        </tr>
      ';
    break;
    }
}

?>