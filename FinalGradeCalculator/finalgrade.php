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
    
    <?php include 'header.php';
    
    ?>

    <div id = "right">

    <?php

        #Constants are used for the weights for each grade component
        #Participation, Quiz, Lab, Practicum weights are defined as constants
        define("WEIGHT_PARTICIPATION", $_POST['weightParticipation']);
        define("WEIGHT_QUIZ", $_POST['weightQuiz']);
        define("WEIGHT_LAB", $_POST['weightLab']);
        define("WEIGHT_PRACTICUM", $_POST['weightPracticum']);


        #Returns the percentage earned (for each grade component).
        function calculatePercentage($gradeEarned, $gradeMaximum) {
                    $percentageGrade = $gradeEarned / $gradeMaximum;
                    return $percentageGrade;
        }

        #Returns weighted value earned towards the total grade (for each grade component)
        function calculateWeightedGrade($percentageGrade, $weightOfGrade){
                    $weightedGrade = $percentageGrade * ($weightOfGrade / 100);
                    return $weightedGrade * 100;
        }

        

        #Assign the value of the index equal to the name attribute of each field.
        #This is how we reference each piece of data through the $_POST array

        #Each earned grade component is assigned to the $_POST array.
        $earnedParticipation = $_POST['earnedParticipation'];
        $earnedQuiz = $_POST['earnedQuiz'];
        $earnedLab = $_POST['earnedLab'];
        $earnedPracticum = $_POST['earnedPracticum'];

        #Each maximum grade of each grade component is assigned to the $_POST array.
        $maxParticipation = $_POST['maxParticipation'];
        $maxQuiz = $_POST['maxQuiz'];
        $maxLab = $_POST['maxLab'];
        $maxPracticum = $_POST['maxPracticum'];


        
        #Calculates the percentage grade for each grade component
        $participationGrade = calculatePercentage($earnedParticipation, $maxParticipation);
        $quizGrade  = calculatePercentage($earnedQuiz, $maxQuiz);
        $labGrade = calculatePercentage($earnedLab, $maxLab);
        $practicumGrade  = calculatePercentage($earnedPracticum, $maxPracticum);

        #Calculates the weighted grade for each grade component
        $percentWeightParticipation = calculateWeightedGrade($participationGrade, WEIGHT_PARTICIPATION);
        $percentWeightQuiz =calculateWeightedGrade($quizGrade, WEIGHT_QUIZ);
        $percentWeightLab =calculateWeightedGrade($labGrade, WEIGHT_LAB);
        $percentWeightPracticum =calculateWeightedGrade($practicumGrade, WEIGHT_PRACTICUM);

        #Determines final grade percentage
        $finalGrade = ($percentWeightParticipation + $percentWeightQuiz + $percentWeightLab + $percentWeightPracticum);

        #Determines the letter grade based on the final grade percentage.
        #Letter grades are based off of the syllabus grading scale.

        $letterGrade = "";

        $letterGrade =($finalGrade >=0 && $finalGrade <60) ?"F" :(
        ($finalGrade >=60 && $finalGrade <70) ? "D" :(
        ($finalGrade >=70 && $finalGrade <75) ? "C" :(
        ($finalGrade >=75 && $finalGrade <80) ? "C+" :(
        ($finalGrade >=80 && $finalGrade <85) ? "B" :(
        ($finalGrade >=85 && $finalGrade <90) ? "B+" :(
        ($finalGrade >=90 && $finalGrade <95) ? "A" :(
        ($finalGrade >=95) ? "A+":"Something else")))))));

    ?>
    
<div id = "output">
<?php
        echo "<p>You earned a " . $participationGrade * 100 . "% for Participation, with a weighted value of " . $percentWeightParticipation. "%</p>";
        echo "<p>You earned a " . $quizGrade * 100 . "% for Quizzes, with a weighted value of " . $percentWeightQuiz. "%</p>";
        echo "<p>You earned a " . $labGrade * 100 . "% for the Lab Assignments, with a weighted value of " . $percentWeightLab. "%</p>";
        echo "<p>You earned a " . $practicumGrade * 100 . "% for Practica, with a weighted value of " . $percentWeightPracticum. "%</p>";
        echo "<p>Your final grade is a " . $finalGrade . "%" . " which is a "  . $letterGrade .  "</p>";
?>
</div>
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