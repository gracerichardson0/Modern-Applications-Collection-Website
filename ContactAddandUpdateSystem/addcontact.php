<!--Created By Nicholas Richardson-->
<!--IT 207-001, 4/14/2017-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns= “http://www.w3.org/1999/xhtml”>
<head>
<title>Lab 3: Add Contact</title>
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
If any input fields are left empty, then it will redirect the user to the invalid.php page
telling them what they need to fix
*/
if (isset($_POST['formSubmit'])) {
  if (empty($_POST['firstname']) || (empty($_POST['lastname'])) || (empty($_POST['emailaddress'])) || (empty($_POST['phonenumber'])) || (empty($_POST['address'])) || (empty($_POST['city'])) || (empty($_POST['state'])) || (empty($_POST['zip']))) {
                header("Location: invalid.php");
  }
  
  if(isset($_POST['firstname'])){
            $firstName  = $_POST['firstname'];
    }

    if(isset($_POST['lastname'])){
            $lastName  = $_POST['lastname'];
    }

    if(isset($_POST['emailaddress'])){
            $emailAddress  = $_POST['emailaddress'];
    }

    if(isset($_POST['phonenumber'])){
            $phoneNumber  = $_POST['phonenumber'];
    }

    if(isset($_POST['address'])){
            $address  = $_POST['address'];
    }

    if(isset($_POST['city'])){
            $city  = $_POST['city'];
    }

    if(isset($_POST['state'])){
            $state  = $_POST['state'];
    }

    if(isset($_POST['zip'])){
            $zip  = $_POST['zip'];
    }
  /*
    If the file is locked, then write the data to the file, and unlock it, sayiing the file has been saved.
    Then it will set the new line equal to whatever the user entered for the form.
    Otherwise, tell the user that the file had an error locking, which also means it has a problem saving the file.
    Then, it closes the file.
  */
  if(file_exists("contacts.txt")){
    $file= fopen("contacts.txt", "a") or die ("Error: Cannot open file.");
    $datasaved =  $firstName . "," . $lastName . "," . $emailAddress . "," . $phoneNumber . "," . $address . "," . $city . "," . $state . "," . $zip . "\n";
    if(flock($file,LOCK_EX)){
      fwrite($file, $datasaved);
      flock($file, LOCK_UN);
      echo '<br>File has been saved';
    }else{
      echo "<br>Error locking file!";
      echo "<br>Error saving file!";
    }
      fclose($file);
  }else{
      echo "<br>The file does not exist";
  }
}

?>
<h1>New Contract Entry</h1>
<form action= "addcontact.php" method = "post">
  First name
  <input type="text" name="firstname" value="">
  Last name
  <input type="text" name="lastname" value="">
  <br>
  <br>
  Email Address
  <input type = "text" name = "emailaddress" value = "">
  <br>
  <br>
  Phone Number
  <input type = "text" name = "phonenumber" value = "">
  <br>
  <br>
  Address
  <input type = "text" name = "address" value = "">
  City
  <input type = "text" name = "city" value = "">
  <br>
  <br>
  State
  <select name = "state">
    <option value="Alabama">Alabama</option>
	<option value="Alaska">Alaska</option>
	<option value="Arizona">Arizona</option>
	<option value="Arkansas">Arkansas</option>
	<option value="California">California</option>
	<option value="Colorado">Colorado</option>
	<option value="Connecticut">Connecticut</option>
	<option value="Delaware">Delaware</option>
	<option value="District Of Columbia">District Of Columbia</option>
	<option value="Florida">Florida</option>
	<option value="Georgia">Georgia</option>
	<option value="Hawaii">Hawaii</option>
	<option value="Idaho">Idaho</option>
	<option value="Illinois">Illinois</option>
	<option value="Indiana">Indiana</option>
	<option value="Iowa">Iowa</option>
	<option value="Kansas">Kansas</option>
	<option value="Kentucky">Kentucky</option>
	<option value="Louisiana">Louisiana</option>
	<option value="Maine">Maine</option>
	<option value="Maryland">Maryland</option>
	<option value="Massachusetts">Massachusetts</option>
	<option value="Michigan">Michigan</option>
	<option value="Minnesota">Minnesota</option>
	<option value="Mississippi">Mississippi</option>
	<option value="Missouri">Missouri</option>
	<option value="Montana">Montana</option>
	<option value="Nebraska">Nebraska</option>
	<option value="Nevada">Nevada</option>
	<option value="New Hampshire">New Hampshire</option>
	<option value="New Jersey">New Jersey</option>
	<option value="New Mexico">New Mexico</option>
	<option value="New York">New York</option>
	<option value="North Carolina">North Carolina</option>
	<option value="North Dakota">North Dakota</option>
	<option value="Ohio">Ohio</option>
	<option value="Oklahoma">Oklahoma</option>
	<option value="Oregon">Oregon</option>
	<option value="Pennsylvania">Pennsylvania</option>
	<option value="Rhode Island">Rhode Island</option>
	<option value="South Carolina">South Carolina</option>
	<option value="South Dakota">South Dakota</option>
	<option value="Tennessee">Tennessee</option>
	<option value="Texas">Texas</option>
	<option value="Utah">Utah</option>
	<option value="Vermont">Vermont</option>
	<option value="Virginia">Virginia</option>
	<option value="Washington">Washington</option>
	<option value=">West Virginia">West Virginia</option>
	<option value="Wisconsin">Wisconsin</option>
	<option value="Wyoming">Wyoming</option>
  </select>
Zip
<input type = "text" name = "zip" value = "">
<br>
<br>
  <input type="submit" name='formSubmit' value="Add Entry">
</form>
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