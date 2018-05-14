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
If any input fields are left empty, then it will redirect the user to the invalid.php page
telling them what they need to fix
*/
if (isset($_POST['formSubmit'])){
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
						This line will get the comma separated values needed to properly overwrite the specific file line
						*/
    					$output = $firstName . "," . $lastName . "," . $emailAddress . "," . $phoneNumber . "," . $address . "," . $city . "," . $state . "," . $zip; 

    					/*
						Opens the file in a+, gets an array of lines with $data
						*/

					 	$file= fopen("contacts.txt", "a+");
					 	$data = file("contacts.txt"); // reads an array of lines

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
					to the first two values in the line separated by commas, then set the line equal to the
					new updated input.
					*/
					for($i=0; $i<count($contacts); $i++){
						$data_content= explode(",", $contacts[$i]);
						if($data_content[0] == $firstName && $data_content[1] == $lastName){
							$contacts[$i] = $firstName . "," . $lastName . "," . $emailAddress . "," . $phoneNumber . "," . $address . "," . $city . "," . $state . "," . $zip;
							break;
						}
					}

					/*
					For the length of the $data array, if the first or last name searched is present in the file line,
					then set that array index equal to the output
					*/

					foreach($data as $contact)
					{
						if(strpos($contact, $firstName) || strpos($contact, $lastName)){
					 		$data[strpos($contact, $firstName)] = $output;
					 		break;
						}
					}


					/*
						If the file is locked, then write the data to the file, and unlock it, sayiing the file has been saved.
						Otherwise, tell the user that the file had an error locking, which also means it has a problem saving the file.
						Then, it closes the file.
					*/
					  if(flock($file,LOCK_EX)){
					  	fwrite($file, implode("\n", $data));
					  	flock($file, LOCK_UN);
					  	echo '<br><br><h3>File has been saved!</h3>';
					  }else{
					  	echo "<br>Error locking file!";
					  	echo "<br>Error saving file!";
					  }
					  fclose($file);
					  
					}

?>
<br><br>
<a href = index.php>Return to Directory</a>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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