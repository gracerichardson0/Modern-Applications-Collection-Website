<!--Created By Nicholas Richardson-->
<!--IT 207-001, 4/14/2017-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns= “http://www.w3.org/1999/xhtml”>
<head>
<title>Lab 3: Update Contact</title>
<link rel="stylesheet" type="text/css" href="../index.css">
<link rel="stylesheet" type="text/css" href="styles.css">
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

<div id = "labContent">

<?php
/*
Checks if the form submit button was pressed, and if it was, then validation is performed
If any input fields are left empty when searching for a user, then it will redirect the user to the invalid.php page
telling them what they need to fix
*/

if(isset($_POST['formSubmit'])) {
						if (empty($_POST['firstname']) || (empty($_POST['lastname']))) {
                				header("Location: invalid.php");
                		}

						if(isset($_POST['firstname'])){
					            $firstName  = $_POST['firstname'];
					    }

					    if(isset($_POST['lastname'])){
					            $lastName  = $_POST['lastname'];
					    }

					/*
					If the file exists, then get the array of lines, otherwise tell the user the file does not exist (something must have been deleted)
					*/
					if(file_exists("contacts.txt")){
						$contacts = file("contacts.txt");
					}else{
    					echo "File does not exist!";
    				}

    				/*
					For the length of the array of lines in the file,
					explode each line into an array, and if the first name or last name is equal
					to the first two values in the line separated by commas, then set the array of
					values to be prefilled for the sticky form to each element in the array.
					Also, prints out the form using an echo statement and utilizes complex
					syntax for strings.
					*/

					for($i=0; $i<count($contacts); $i++){
						$data_content= explode(",", $contacts[$i]);
						if($data_content[0] == $firstName && $data_content[1] == $lastName){					
							echo "
					<form action= 'updateData.php' method = 'post'>
					  First name
					  <input type='text' name='firstname' value= '{$data_content[0]}' />
					  Last name
					  <input type='text' name='lastname' value='{$data_content[1]}' />
					  <br>
					  <br>
					  Email Address
					  <input type = 'text' name = 'emailaddress' value = '{$data_content[2]}' />
					  <br>
					  <br>
					  Phone Number
					  <input type = 'text' name = 'phonenumber' value = '{$data_content[3]}' />
					  <br>
					  <br>
					  Address
					  <input type = 'text' name = 'address' value = '{$data_content[4]}' />
					  City
					  <input type = 'text' name = 'city' value = '{$data_content[5]}' />
					  <br>
					  <br>
					  State
					  <select name = 'state' value = '' />
					  	<option selected>{$data_content[6]}</option>
					    <option value='Alabama'>Alabama</option>
						<option value='Alaska'>Alaska</option>
						<option value='Arizona'>Arizona</option>
						<option value='Arkansas'>Arkansas</option>
						<option value='California'>California</option>
						<option value='Colorado'>Colorado</option>
						<option value='Connecticut'>Connecticut</option>
						<option value='Delaware'>Delaware</option>
						<option value='District Of Columbia'>District Of Columbia</option>
						<option value='Florida'>Florida</option>
						<option value='Georgia'>Georgia</option>
						<option value='Hawaii'>Hawaii</option>
						<option value='Idaho'>Idaho</option>
						<option value='Illinois'>Illinois</option>
						<option value='Indiana'>Indiana</option>
						<option value='Iowa'>Iowa</option>
						<option value='Kansas'>Kansas</option>
						<option value='Kentucky'>Kentucky</option>
						<option value='Louisiana'>Louisiana</option>
						<option value='Maine'>Maine</option>
						<option value='Maryland'>Maryland</option>
						<option value='Massachusetts'>Massachusetts</option>
						<option value='Michigan'>Michigan</option>
						<option value='Minnesota'>Minnesota</option>
						<option value='Mississippi'>Mississippi</option>
						<option value='Missouri'>Missouri</option>
						<option value='Montana'>Montana</option>
						<option value='Nebraska'>Nebraska</option>
						<option value='Nevada'>Nevada</option>
						<option value='New Hampshire'>New Hampshire</option>
						<option value='New Jersey'>New Jersey</option>
						<option value='New Mexico'>New Mexico</option>
						<option value='New York'>New York</option>
						<option value='North Carolina'>North Carolina</option>
						<option value='North Dakota'>North Dakota</option>
						<option value='Ohio'>Ohio</option>
						<option value='Oklahoma'>Oklahoma</option>
						<option value='Oregon'>Oregon</option>
						<option value='Pennsylvania'>Pennsylvania</option>
						<option value='Rhode Island'>Rhode Island</option>
						<option value='South Carolina'>South Carolina</option>
						<option value='South Dakota'>South Dakota</option>
						<option value='Tennessee'>Tennessee</option>
						<option value='Texas'>Texas</option>
						<option value='Utah'>Utah</option>
						<option value='Vermont'>Vermont</option>
						<option value='Virginia'>Virginia</option>
						<option value='Washington'>Washington</option>
						<option value='>West Virginia'>West Virginia</option>
						<option value='Wisconsin'>Wisconsin</option>
						<option value='Wyoming'>Wyoming</option>
					  </select>
					Zip
					<input type = 'text' name = 'zip' value = '{$data_content[7]}' />
					<br>
					<br>
					  <input type='submit' name= 'formSubmit' value='Update Entry'>
					</form>";
					break;
						}
					}
}
?>
<br>
<a href = index.php>Return to Directory</a>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<p></p>
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