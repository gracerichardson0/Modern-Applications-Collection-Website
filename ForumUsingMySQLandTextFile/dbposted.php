<!--Created By Nicholas Richardson-->
<!--IT 207-001, 4/27/2017-->
<?php 
require 'dbinfo.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns= “http://www.w3.org/1999/xhtml”>
<head>
<title>Lab 4: Comments Added</title>
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
<h1>Comments Added</h1>
<hr>
<?php
//Constant used for values that do not change
define("FILE_SAVED", "File was successfully saved.");

if (isset($_POST['submit'])) {

    if(isset($_POST['name'])){
            $name  = $_POST['name'];
    }

    if(isset($_POST['email'])){
            $email  = $_POST['email'];
    }

    if(isset($_POST['comment'])){
            $comment  = $_POST['comment'];
    }

    

    //DB Connection
    $DBConnect = @mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbusername);

    if ($DBConnect===FALSE){
        echo "<p>Connection failed.</p>\n";
    }else{

        //Selecting Database
        $sqlstatement = "USE " . $dbusername;

        //Checking if name was already entered
        $result = mysqli_query($DBConnect, "SELECT name FROM Comments WHERE name LIKE '". $name . "'");
        if(mysqli_num_rows($result) > 0) {
            header("Location: dbnotadded.php");
            exit();
        } 

        //Inserting Values from form input to 'Comments' Table
        $insertValues = "INSERT INTO Comments (name, email, comment) 
                         VALUES ('$name','$email', '$comment')";

        mysqli_query($DBConnect, $insertValues) or die(mysqli_error($DBConnect));
        
             
        if (!mysqli_query($DBConnect, $sqlstatement)) {
            echo "MySQL STATE error --->" . mysqli_sqlstate($DBConnect) . "<br />";
        }
        else{

            //Creating Table 'Comments'
            $createTable = "CREATE TABLE Comments (
                id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(30) NOT NULL,
                email VARCHAR(50) NOT NULL,
                comment VARCHAR(100) NOT NULL
            )";

            if (mysqli_query($DBConnect, $createTable)) {
                echo "Table Comments created successfully<br />";
            } 
            
            //Displaying comments
            mysqli_select_db($DBConnect, $dbusername);
            $SQLstring = "SELECT * FROM Comments";
            $QueryResult = @mysqli_query($DBConnect, $SQLstring) or die("<p>Error " . mysqli_error($DBConnect)) . "</p>";
            $row = mysqli_fetch_row($QueryResult);
            $count = 0;
            do {
                ++$count;
                echo "<b>" .$count . ".</b>". "&nbsp&nbsp&nbspName: ";
                echo "<a href=mailto:\"", htmlspecialchars($row[2]), "\">", htmlspecialchars($row[1]), "</a>";
                echo "<br>Comments:" . "  ". nl2br(htmlspecialchars($row[3]));
                echo "<hr>";
                $row = mysqli_fetch_row($QueryResult);
            } while ($row);                             
        }

        mysqli_close($DBConnect);
    }
}

?>


<a href = "dbindex.php">Someone Else Want to Comment?</a><br>
<a href = "dbcomments.php">View Posting Comments</a>
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