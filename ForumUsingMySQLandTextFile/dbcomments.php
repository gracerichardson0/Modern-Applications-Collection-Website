<?php 
require 'dbinfo.php';
?>
<!--Created By Nicholas Richardson-->
<!--IT 207-001, 4/27/2017-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns= “http://www.w3.org/1999/xhtml”>
<head>
<title>Lab 4: Add Comments</title>
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
    <h2>Huh?</h2>
    Kirschner and Karpinski report that:
    <br>
    Students who used social networking sites while studying scored 20% lower on tests and students who used social media had an average GPA of 3.06 versus non users who had an average GPA of 3.82.
    <br>
    Source: Paul A Kirschner and Aryn C. Karpinski, "Facebook and Academic Performance," Computers in Human Behavior, Nov.2010
    <h1>Comments</h1>

    <?php

    //DB Connection
    $DBConnect = @mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbusername);



    if ($DBConnect===FALSE){
        echo "<p>Connection failed.</p>\n";
    }else{
            //Selecting Database
            $sqlstatement = "USE " . $dbusername;


    if (isset($_POST['submit'])) {
        if(isset($_POST['delete'])){

            //Gets the value for the deletion
            $index = $_POST['delete'];

            //Deletion query for MySQL
            //Deletes row where the id is equal to value entered by user
            $delete = "DELETE FROM Comments WHERE id=". $index;
            
            //Drops the ID column to prepare for renumbering of IDs
            $update = "ALTER TABLE Comments DROP id";

            //Adds ID column back and auto_increments from beginning of table, renumber successful
            $add = "ALTER TABLE Comments ADD id int not null auto_increment primary key first;";
            
            if (!mysqli_query($DBConnect, $delete)) {
                echo "Error deleting record: " . mysqli_error($DBConnect);
            }
            
            if (!mysqli_query($DBConnect, $update)) {
                echo "Error dropping ID column: " . mysqli_error($DBConnect);
            }

            if (!mysqli_query($DBConnect, $add)) {
                echo "Error adding ID column record: " . mysqli_error($DBConnect);
            }
        }
    }

    /*
    If one of the sortby links is clicked, then check for which one
    */
    if(isset($_GET['sortby'])){


            /*
            If the A-Z link is clicked, then execute the query to order the table by ascending order
            */
            if($_GET['sortby'] === "az") {
                $QueryResult = @mysqli_query($DBConnect, "SELECT * FROM Comments ORDER BY name ASC");
                $row = mysqli_fetch_row($QueryResult);
                $count = 0;
                echo "<hr>";
                do {
                    ++$count;
                    echo "<b>" .$count . ".</b>". "&nbsp&nbsp&nbspName: ";
                    echo "<a href=mailto:\"", htmlspecialchars($row[2]), "\">", htmlspecialchars($row[1]), "</a>";
                    echo "<br>Comments:" . "  ". nl2br(htmlspecialchars($row[3]));
                    echo "<hr>";
                    $row = mysqli_fetch_row($QueryResult);
                } while ($row);                             
            }

            /*
            If the Z-A link is clicked, then execute the query to order the table by descending order
            */
            if($_GET['sortby'] === "za") {
                $QueryResult = @mysqli_query($DBConnect, "SELECT * FROM Comments ORDER BY name DESC");
                $row = mysqli_fetch_row($QueryResult);
                $count = 0;
                echo "<hr>";
                do {
                    ++$count;
                    echo "<b>" .$count . ".</b>". "&nbsp&nbsp&nbspName: ";
                    echo "<a href=mailto:\"", htmlspecialchars($row[2]), "\">", htmlspecialchars($row[1]), "</a>";
                    echo "<br>Comments:" . "  ". nl2br(htmlspecialchars($row[3]));
                    echo "<hr>";
                    $row = mysqli_fetch_row($QueryResult);
                } while ($row);                             
            }

    } else{
            //If none of the links were clicked then just display like usual
            //Selects all comments from the table
            mysqli_select_db($DBConnect, $dbusername);
            $SQLstring = "SELECT * FROM Comments";

            //Gets result from previous query
            $QueryResult = @mysqli_query($DBConnect, $SQLstring) or die("<p>Error " . mysqli_error($DBConnect)) . "</p>";

            //Gets row values in an array and displays each index as invidual part of the comment (name, email, comment, id)
            $row = mysqli_fetch_row($QueryResult);
            $count = 0;
            echo "<hr>";
            if($row > 0){
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
<a href = "dbindex.php">Add New Comment</a><br>
<a href = "?sortby=az">Sort Comments A-Z (by name)</a><br>
<a href = "?sortby=za">Sort Comments Z-A (by name)</a><br><br>
<form action = "dbcomments.php" method = "POST">
Delete Comment Number:
<input size = "1" type = "number" name = "delete" min = "1" max = 10>
<input type = "submit" name = "submit" value = "Delete">


</form>
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