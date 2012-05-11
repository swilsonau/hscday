<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>HSC Day 2011 - Games in Lab 1</title>
<script src="jquery-1.6.1.min.js" type="text/javascript"></script>
<script src="ticker.js" type="text/javascript"></script>
<style type="text/css">
body {
  font-family: Arial;
  margin: 0;
}

#window {
  width: 1000px;
  height: 760px;
  margin-left: auto;
  margin-right: auto;
  border: 1px solid black;
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
  text-align: center;
}

li {
  font-size: 35px;
}
</style>
<script language="Javascript">
$(document).ready(function(){
	$('#ticker').list_ticker({
		speed:5000,
                effect:'fade'
	})		
})

setInterval("settime()", 1000);
 
function settime () {
  var curtime = new Date();
  var curhour = curtime.getHours();
  var curmin = curtime.getMinutes();
  var cursec = curtime.getSeconds();
  var time = "";
 
  if(curhour == 0) curhour = 12;
  time = (curhour > 12 ? curhour - 12 : curhour) + ":" +
         (curmin < 10 ? "0" : "") + curmin + " " +
         (curhour > 12 ? "PM" : "AM");
 
  document.date.clock.value = time;
}

var refreshId = setInterval(function()
{
     $('#responsecontainer').load('computerlist.php');
     $('#games').load('games.php');
}, 1000);
</script>
</head> 
 
<body>
<div id="window">
  <table width="100%">
    <tr>
      <td width="50%">
      <div id="responsecontainer"></div>
      </td>
      <td valign="top">
      <div style="text-align: center;"><img src="logo.png" /></div><br />
        <table width="100%" height="125">
          <tr style="text-align: center; font-size: 40px; background: red; color: white;">
            <td>Current Time</td>
            <td>Current Game</td>
          </tr>
          <tr>
            <td><form name="date">
            <input type="text" name="clock" style="border: 0px; text-align: center; font-size: 40px;" value="" size="8">
            </form></td>
            <td><div id="games" style="text-align: center; font-size: 40px;"></div></td>
          </tr>
        </table>
        <table width="100%" height="190px">
        <tr>
        <td>
        <ul id="ticker">
          <li>No Food or Drink is to be consumed in this room.</li>
          <li>Please book a game with the cashier.</li>
          <li>The game of choice is Halo.</li>
          <li>Please follow the instructions of staff members.</li>
          <li>Please alert staff you have won a game.</li>
          <li>You are only eligable for prizes if you play on the tournament servers.</li>
          <li>We will be closed for one hour during 12:30PM and 1:30PM for lunch.</li>
          <li>Games finish at 2:30PM.</li>
          <li>Final Round will be for winners only.</li>
        </ul>
        </td>
        </tr>
        </table>
        
        <table width="50%" style="font-size: 20px" align="center">
          <tr>
            <td width="80%">Number of Games</td>
            <td>Price</td>
          </tr>
          <tr>
            <td>1 Game</td>
            <td>$0.50</td>
          </tr>
          <tr>
            <td>3 Games</td>
            <td>$1.00</td>
          </tr>
        </table><BR />
        <div style="color: red; font-size: 15px; text-align: center;">
          MAXIMUM PURCHASE OF 3 GAMES AT ANY TIME
        </div><br />
        <div style="font-size: 20px; text-align: center;">
          <strong>Winners:</strong> Please be available at 2:25PM sharp for the decider round! If you don't turn up, we will go ahead without you.
        </div>
        <td>
      </td>
    </tr>
  </table>
</div>
</body>
</html>