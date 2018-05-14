<!--Created By Nicholas Richardson-->
<!--IT 207-001, 3/23/2017-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns= “http://www.w3.org/1999/xhtml”>
<head>
<title>Lab 2 Office Hours Setup Form</title>
<link rel="stylesheet" type="text/css" href="../index.css">
<link rel="stylesheet" type="text/css" href="calendarstyle.css">
</head>
<body>

<?php
#Specifies the time zone (Eastern Standard Time)
date_default_timezone_set("EST");
?>

<div id = "entireBox">

    <div id = "leftColumn">
        <?php
        #Reads the menu file located in the home directory
        readfile("../menu.inc");
        ?>
    </div>
    
    <?php 
    #Includes the header file located in the home directory
    include '../header.php';
    
    ?>

<br>
<div id = "labContent">
<br>
<h1 align = center> Office Hours Setup Form</h1>
<table>
	<!--
	All of the days of the week are made
	-->
	<tr>
		<td>Day:</td>
		<td>Monday</td>
		<td>Tuesday</td>
		<td>Wednesday</td>
		<td>Thursday</td>
		<td>Thursday</td></div>
	</tr>

	<!--
	Each day of the week has to have 30 minute increments
	as time slots. The values are put into an array
	which are used on the calendar.php page.
	-->

	<tr>
		<td>Time:</td>
		<form  action = "calendar.php" method = "post">
		<td>
		<select name = "mondayTimes[]" multiple>
			<option value = "7:00am">7:00am</option>
			<option value = "7:30am">7:30am</option>
			<option value = "8:00am">8:00am</option>
			<option value = "8:30am">8:30am</option>
			<option value = "9:00am">9:00am</option>
			<option value = "9:30am">9:30am</option>
			<option value = "10:00am">10:00am</option>
			<option value = "10:30am">10:30am</option>
			<option value = "11:00am">11:00am</option>
			<option value = "11:30am">11:30am</option>
			<option value = "12:00pm">12:00pm</option>
			<option value = "12:30pm">12:30pm</option>
			<option value = "1:00pm">1:00pm</option>
			<option value = "1:30pm">1:30pm</option>
			<option value = "2:00pm">2:00pm</option>
			<option value = "2:30pm">2:30pm</option>
			<option value = "3:00pm">3:00pm</option>
			<option value = "3:30pm">3:30pm</option>
			<option value = "4:00pm">4:00pm</option>
			<option value = "4:30pm">4:30pm</option>
			<option value = "5:00pm">5:00pm</option>
			<option value = "5:30pm">5:30pm</option>
			<option value = "6:00pm">6:00pm</option>
			<option value = "6:30pm">6:30pm</option>
			<option value = "7:00pm">7:00pm</option>
			<option value = "7:30pm">7:30pm</option>
			<option value = "8:00pm">8:00pm</option>
			<option value = "8:30pm">8:30pm</option>
			<option value = "9:00pm">9:00pm</option>
			<option value = "9:30pm">9:30pm</option>
			<option value = "10:00pm">10:00pm</option>
		</select></td>

		<td>
		<select name = "tuesdayTimes[]" multiple>
			<option value = "7:00am">7:00am</option>
			<option value = "7:30am">7:30am</option>
			<option value = "8:00am">8:00am</option>
			<option value = "8:30am">8:30am</option>
			<option value = "9:00am">9:00am</option>
			<option value = "9:30am">9:30am</option>
			<option value = "10:00am">10:00am</option>
			<option value = "10:30am">10:30am</option>
			<option value = "11:00am">11:00am</option>
			<option value = "11:30am">11:30am</option>
			<option value = "12:00pm">12:00pm</option>
			<option value = "12:30pm">12:30pm</option>
			<option value = "1:00pm">1:00pm</option>
			<option value = "1:30pm">1:30pm</option>
			<option value = "2:00pm">2:00pm</option>
			<option value = "2:30pm">2:30pm</option>
			<option value = "3:00pm">3:00pm</option>
			<option value = "3:30pm">3:30pm</option>
			<option value = "4:00pm">4:00pm</option>
			<option value = "4:30pm">4:30pm</option>
			<option value = "5:00pm">5:00pm</option>
			<option value = "5:30pm">5:30pm</option>
			<option value = "6:00pm">6:00pm</option>
			<option value = "6:30pm">6:30pm</option>
			<option value = "7:00pm">7:00pm</option>
			<option value = "7:30pm">7:30pm</option>
			<option value = "8:00pm">8:00pm</option>
			<option value = "8:30pm">8:30pm</option>
			<option value = "9:00pm">9:00pm</option>
			<option value = "9:30pm">9:30pm</option>
			<option value = "10:00pm">10:00pm</option>
		</select></td>

		<td>
		<select name = "wednesdayTimes[]" multiple>
			<option value = "7:00am">7:00am</option>
			<option value = "7:30am">7:30am</option>
			<option value = "8:00am">8:00am</option>
			<option value = "8:30am">8:30am</option>
			<option value = "9:00am">9:00am</option>
			<option value = "9:30am">9:30am</option>
			<option value = "10:00am">10:00am</option>
			<option value = "10:30am">10:30am</option>
			<option value = "11:00am">11:00am</option>
			<option value = "11:30am">11:30am</option>
			<option value = "12:00pm">12:00pm</option>
			<option value = "12:30pm">12:30pm</option>
			<option value = "1:00pm">1:00pm</option>
			<option value = "1:30pm">1:30pm</option>
			<option value = "2:00pm">2:00pm</option>
			<option value = "2:30pm">2:30pm</option>
			<option value = "3:00pm">3:00pm</option>
			<option value = "3:30pm">3:30pm</option>
			<option value = "4:00pm">4:00pm</option>
			<option value = "4:30pm">4:30pm</option>
			<option value = "5:00pm">5:00pm</option>
			<option value = "5:30pm">5:30pm</option>
			<option value = "6:00pm">6:00pm</option>
			<option value = "6:30pm">6:30pm</option>
			<option value = "7:00pm">7:00pm</option>
			<option value = "7:30pm">7:30pm</option>
			<option value = "8:00pm">8:00pm</option>
			<option value = "8:30pm">8:30pm</option>
			<option value = "9:00pm">9:00pm</option>
			<option value = "9:30pm">9:30pm</option>
			<option value = "10:00pm">10:00pm</option>
		</select></td>

		<td>
		<select name = "thursdayTimes[]" multiple>
			<option value = "7:00am">7:00am</option>
			<option value = "7:30am">7:30am</option>
			<option value = "8:00am">8:00am</option>
			<option value = "8:30am">8:30am</option>
			<option value = "9:00am">9:00am</option>
			<option value = "9:30am">9:30am</option>
			<option value = "10:00am">10:00am</option>
			<option value = "10:30am">10:30am</option>
			<option value = "11:00am">11:00am</option>
			<option value = "11:30am">11:30am</option>
			<option value = "12:00pm">12:00pm</option>
			<option value = "12:30pm">12:30pm</option>
			<option value = "1:00pm">1:00pm</option>
			<option value = "1:30pm">1:30pm</option>
			<option value = "2:00pm">2:00pm</option>
			<option value = "2:30pm">2:30pm</option>
			<option value = "3:00pm">3:00pm</option>
			<option value = "3:30pm">3:30pm</option>
			<option value = "4:00pm">4:00pm</option>
			<option value = "4:30pm">4:30pm</option>
			<option value = "5:00pm">5:00pm</option>
			<option value = "5:30pm">5:30pm</option>
			<option value = "6:00pm">6:00pm</option>
			<option value = "6:30pm">6:30pm</option>
			<option value = "7:00pm">7:00pm</option>
			<option value = "7:30pm">7:30pm</option>
			<option value = "8:00pm">8:00pm</option>
			<option value = "8:30pm">8:30pm</option>
			<option value = "9:00pm">9:00pm</option>
			<option value = "9:30pm">9:30pm</option>
			<option value = "10:00pm">10:00pm</option>
		</select></td>

		<td>
		<select name = "fridayTimes[]" multiple>
			<option value = "7:00am">7:00am</option>
			<option value = "7:30am">7:30am</option>
			<option value = "8:00am">8:00am</option>
			<option value = "8:30am">8:30am</option>
			<option value = "9:00am">9:00am</option>
			<option value = "9:30am">9:30am</option>
			<option value = "10:00am">10:00am</option>
			<option value = "10:30am">10:30am</option>
			<option value = "11:00am">11:00am</option>
			<option value = "11:30am">11:30am</option>
			<option value = "12:00pm">12:00pm</option>
			<option value = "12:30pm">12:30pm</option>
			<option value = "1:00pm">1:00pm</option>
			<option value = "1:30pm">1:30pm</option>
			<option value = "2:00pm">2:00pm</option>
			<option value = "2:30pm">2:30pm</option>
			<option value = "3:00pm">3:00pm</option>
			<option value = "3:30pm">3:30pm</option>
			<option value = "4:00pm">4:00pm</option>
			<option value = "4:30pm">4:30pm</option>
			<option value = "5:00pm">5:00pm</option>
			<option value = "5:30pm">5:30pm</option>
			<option value = "6:00pm">6:00pm</option>
			<option value = "6:30pm">6:30pm</option>
			<option value = "7:00pm">7:00pm</option>
			<option value = "7:30pm">7:30pm</option>
			<option value = "8:00pm">8:00pm</option>
			<option value = "8:30pm">8:30pm</option>
			<option value = "9:00pm">9:00pm</option>
			<option value = "9:30pm">9:30pm</option>
			<option value = "10:00pm">10:00pm</option>
		</select></td><br>
			
</table>
<!--
Submit button and clear buttons are styled on the css page
-->

<div id = "submitbutton">
<button align = "center" type="submit" value="Submit" style="">Submit</button>
<button align = "center" type="reset" value="Clear">Clear</button>
</div>		
			
</form>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div id = "footer" align = center>
        <b>
        This web site is entirely original work and full academic copyright is retained. This web site complies
with the Mason Honor Code (http://catalog.gmu.edu/content.php?catoid=5&navoid=410#Honor).
        </b>
    </p>
</div>
</div>
</body>
</html>