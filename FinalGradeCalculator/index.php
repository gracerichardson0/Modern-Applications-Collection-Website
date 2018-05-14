<!--Created By Nick Richardson-->
<!--IT 207-001, 2/26/2017-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns= “http://www.w3.org/1999/xhtml”>
<head>
<title>Lab 1 Home Page</title>
<link rel="stylesheet" type="text/css" href="index.css">
<link rel = "stylesheet" type = "text/css" href = "form.css">
</head>
<body>

<?php
date_default_timezone_set("EST");
?>

<div id = "entireBox">

	<div id = "leftColumn">
		<?php
        readfile("../menu.inc");
        ?>
	</div>
    
	<?php include 'header.php'; ?>
    
    

	<div id = "right">
		<form action="finalgrade.php" method="post">
            <h3>Participation</h3>
            Earned: <input type="text" name="earnedParticipation" />
            Max: <input type="text" name="maxParticipation" />
            Weight (percentage): <input type="text" name="weightParticipation" />
            <h3>Quizzes</h3>
            Earned: <input type="text" name="earnedQuiz" />
            Max: <input type="text" name="maxQuiz"/>
            Weight (percentage): <input type="text" name="weightQuiz" />
            <h3>Lab Assignments</h3>
            Earned: <input type="text" name="earnedLab" />
            Max: <input type="text" name="maxLab" />
            Weight (percentage): <input type="text" name="weightLab" />
            <h3>Practica</h3>
            Earned: <input type="text" name="earnedPracticum" />
            Max: <input type="text" name="maxPracticum" />
            Weight (percentage): <input type="text" name="weightPracticum" />
            <br /><br />
            <input type="submit" />
        </form>
	</div>
	
	<div id = "footer" align = center>
		<b>
		This web site is entirely original work and full academic copyright is retained. This web site complies
with the Mason Honor Code (http://catalog.gmu.edu/content.php?catoid=5&navoid=410#Honor).
		</b>
	</p>
	</div>
</body>
</html>