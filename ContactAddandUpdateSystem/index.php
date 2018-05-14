<!--Created By Nicholas Richardson-->
<!--IT 207-001, 4/14/2017-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns= “http://www.w3.org/1999/xhtml”>
<head>
<title>Lab 3: Online Contacts Directory</title>
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
<h1>Online Contacts Directory</h1>
<h2>Search for a Contact</h2>
<?php
	if(isset($_POST['firstname'])){
	        $firstName  = $_POST['firstname'];
	}

    if(isset($_POST['lastname'])){
            $lastName  = $_POST['lastname'];
 	}

 	
?>
  
  <form  action =  "update.php" method = "POST">
  First name
  <input type="text" name="firstname" value="">
  <br><br>
  Last name
  <input type="text" name="lastname" value="">
  <br><br>
  <input type="submit" name= 'formSubmit' value="Submit">
</form> 
<hr>
<a href = addcontact.php>Add New Contact Entry</a>
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
<br>
<br>
</div>
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