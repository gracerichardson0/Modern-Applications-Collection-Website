<!--Created By Nicholas Richardson-->
<!--IT 207-001, 4/27/2017-->
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

    /*
    The while loop will read each line of the file in turn ... 
    assigning the line to the $row variable as an array of values based on being separated by commas.

    the fgetcsv() function will get the line as an array based on it being a comma separated value list... 
    then it tests the first element against the string
    */
    $fp = fopen("comments.txt", "r");
    while ($row  = fgetcsv($fp)){
        if (strtolower($name) == strtolower($row[0])){
            header("Location: notadded.php");
            exit();
        }
    }
    fclose($fp);
    
    if(file_exists("comments.txt")){
        $file = fopen("comments.txt", "a+") or die ("Error: Cannot open file.");
        $saved_comments = $name . "," . $email . "," . $comment . "\n";
        if(flock($file,LOCK_EX)){
            fwrite($file, $saved_comments);
            flock($file, LOCK_UN);
            //echo '<br>File has been saved';
        }else{
            echo "<br>Error locking file!";
            echo "<br>Error saving file!";
        }
            fclose($file);
        }else{
            echo "<br>The file does not exist";
        }
}

/*
 htmlspecialchars replaces characters in text that HTML handles specially. so it replaces < with &lt; and > with &gt;, and the browser shows &lt; as < and &gt; as >. I did this so that these characters show up properly, and also to prevent a cross-site scripting attack where people use <script> tags in comments

 nl2br replaces line breaks (which would otherwise show up as spaces in the browser) with the HTML <br> tag (which shows up as a line break in the browser)
*/
if (file_exists("comments.txt")) {
    $file = file("comments.txt");
    $count = 0;

    foreach ($file as $line) {
        $count++;
        list($name,$email,$comment) = explode(",", $line);
        echo "<b>" .$count . ".</b>". "&nbsp&nbsp&nbspName: ";
        echo "<a href=mailto:\"", htmlspecialchars($email), "\">", htmlspecialchars($name), "</a>";
        echo "<br>Comments:" . "  ". nl2br(htmlspecialchars($comment));
        echo "<hr>";
    }
} else {
    echo "<br>File does not exist!<br>";
}

?>


<a href = "index.php">Someone Else Want to Comment?</a><br>
<a href = "comments.php">View Posting Comments</a>
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