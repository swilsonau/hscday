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
$(document).ready(function() {
$('#bookin').submit(function() { // catch the form's submit event
    $.ajax({ // create an AJAX call...
        data: $(this).serialize(), // get the form data
        type: $(this).attr('method'), // GET or POST
        url: $(this).attr('action'), // the file to call
        success: function(response) { // on success..
            $('#bookresponse').html(response); // update the DIV
        }
    });
    return false; // cancel original event to prevent form submitting
});

$('#adminform').submit(function() { // catch the form's submit event
    $.ajax({ // create an AJAX call...
        data: $(this).serialize(), // get the form data
        type: $(this).attr('method'), // GET or POST
        url: $(this).attr('action'), // the file to call
        success: function(response) { // on success..
            $('#adminresponse').html(response); // update the DIV
        }
    });
    return false; // cancel original event to prevent form submitting
});
});
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
      <div style="text-align: center; font-size: 20px;"><img src="logo.png" /><br /><strong>Administrator Console</strong></div>
        <table width="100%">
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
        </table><br />
        <form id="bookin" method="post" action="processbookin.php">
        <table width="70%" align="center" border="0">
          <tr>
            <td width="30%"><strong>Name:</strong></td>
            <td><input type="text" size="30" name="name" /></td>
          </tr>
          <tr>
            <td><strong>Games:</strong></td>
            <td>
              <select name="games">
                <option value="1">1 Game</option>
                <option value="3">3 Games</option>
            </td>
          </tr>
          <tr>
            <td align="center"><input type="submit" value="Book In" /></td>
            <td><div id="bookresponse"></div></tr>
        </table>
        </form><br />
        <form id="adminform" method="post" action="processadmin.php">
        <div align="center">
        <select name="action">
          <option value="start">Start Game</option>
          <option value="end">End Game</option>
          <option value="clear">Release Computers</option>
        </select>  <input type="submit" value="Process" />
        </div>
        <div id="adminresponse"></div>
        </form>
        <br />
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
          <strong>Winners:</strong> Please be available at 2:10PM sharp for the decider round! If you don't turn up, we will go ahead without you.
        </div>
        <td>
      </td>
    </tr>
  </table>
</div>
</body>
</html>