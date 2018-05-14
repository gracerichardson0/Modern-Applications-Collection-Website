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
    <h1>Add Comments</h1>
</p>
    <hr>
    <form action = "posted.php" method = "POST" id = "form">
        Name
        <input type="text" name="name" value="">
        <br>
        <br>
        E-mail:
        <input type="text" name="email" value="">
        <br>
        <br>
        Comments:
        <textarea rows="4" cols="50" name="comment" form="form"></textarea>
        <br>
        <br>
        <input type="submit" name='submit' value="Sign">
        <input type="reset" name='reset' value="Reset Form">
        <br>
        <hr>
        <a href = "comments.php">View Posting Comments</a><br><br>
        <a href = "dbindex.php">-->LINK TO DATABASE VERSION<--</a>

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