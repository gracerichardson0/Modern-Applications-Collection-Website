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
<p>
    <h2>Huh?</h2>
    Kirschner and Karpinski report that:
    <br>
    Students who used social networking sites while studying scored 20% lower on tests and students who used social media had an average GPA of 3.06 versus non users who had an average GPA of 3.82.
    <br>
    Source: Paul A Kirschner and Aryn C. Karpinski, "Facebook and Academic Performance," Computers in Human Behavior, Nov.2010
    <h1>Comments</h1>
    <hr>

<?php

/*
     Gets the value the user entered to delete from the input field in the form.
     Then, it unsets that specific index in the array (text file)
     Then, it uses array_values() to renumber the array.
     Then, the values are put back into the text file using file_put_contents();
*/
if (isset($_POST['submit'])) {
    if(isset($_POST['delete'])){
        $index  = $_POST['delete'];
        $index -=1;
        $data = file("comments.txt");
        unset($data[$index]);
        $data = array_values($data);
        file_put_contents("comments.txt", $data);
    }
}

//If one of the sort links are clicked
if(isset($_GET['sortby'])){
	
    /*
     If the sort link for A-Z is clicked, then it will sort
     the file in ascending order, and then redisplay the comments list
    */
	if($_GET['sortby'] === "az") {

		$sortFile = file("comments.txt");
		sort($sortFile, SORT_NATURAL);
        $count = 0;

        foreach ($sortFile as $line) {
            $count++;
            list($name,$email,$comment) = explode(",", $line);
            echo "<b>" .$count . ".</b>". "&nbsp&nbsp&nbspName: ";
            echo "<a href=mailto:\"", htmlspecialchars($email), "\">", htmlspecialchars($name), "</a>";
            echo "<br>Comments:" . "  ". nl2br(htmlspecialchars($comment));
            echo "<hr>";
        }

	}

    /*
     If the sort link for Z-A is clicked, then it will sort
     the file in descending order, and then redisplay the comments list
    */
    if($_GET['sortby'] === "za") {

		$sortFile = file("comments.txt");
		rsort($sortFile, SORT_NATURAL);
        $count = 0;

        foreach ($sortFile as $line) {
            $count++;
            list($name,$email,$comment) = explode(",", $line);
            echo "<b>" .$count . ".</b>". "&nbsp&nbsp&nbspName: ";
            echo "<a href=mailto:\"", htmlspecialchars($email), "\">", htmlspecialchars($name), "</a>";
            echo "<br>Comments:" . "  ". nl2br(htmlspecialchars($comment));
            echo "<hr>";
        }
	}

}else{

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
        echo "File does not exist!";
    }
}


?>
</p>
<a href = "index.php">Add New Comment</a><br>
<a href = "?sortby=az">Sort Comments A-Z (by name)</a><br>
<a href = "?sortby=za">Sort Comments Z-A (by name)</a><br><br>
<form action = "comments.php" method = "POST">
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