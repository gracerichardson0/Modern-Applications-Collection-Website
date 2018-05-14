<!--Created By Nicholas Richardson-->
<!--IT 207-001, 3/23/2017-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns= “http://www.w3.org/1999/xhtml”>
<head>
<title>Lab 2 Calendar</title>
<link rel="stylesheet" type="text/css" href="../index.css">
<link rel="stylesheet" type="text/css" href="calendarstyle.css">
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
<h3 align = center>Office Hours Sign Up</h3>
<br>
<form align = center action = "calendar.php" method = "post">
    Student Name: <input type="text" name="studentName">
    Student Email: <input type = "text" name = "studentEmail">
    <button name = 'submit' type="submit" value="Submit">Submit</button>
    <button name = 'clear' type="reset" value="Clear">Clear</button><br><br>
    <!--
    Used to assign the values to the hidden input fields.

    First, it checks if it is an array or not (The day of the week's timeslots)
    Then, if it is, it will print the elements with a separator |.
    Otherwise, it will just print the array  if it is an array.

    THIS WORKS FOR ALL INPUTS BELOW (Next five)
    -->

    <input type="hidden" name="mondayTimes" value="
    <?php 
    if(is_array($_POST["mondayTimes"])) {
        foreach($_POST["mondayTimes"] as $time) {
         echo $time."|";}
         }else{
         echo $_POST["mondayTimes"];}
    ?>">

    <input type="hidden" name="tuesdayTimes" value="
    <?php if(is_array($_POST["tuesdayTimes"])) {
        foreach($_POST["tuesdayTimes"] as $time) {
         echo $time."|";}
         }else{
         echo $_POST["tuesdayTimes"];}  
    ?>">

    <input type="hidden" name="wednesdayTimes" value="
    <?php if(is_array($_POST["wednesdayTimes"])) {
        foreach($_POST["wednesdayTimes"] as $time) {
         echo $time."|";}
         }else{
         echo $_POST["wednesdayTimes"];}
    ?>">

    <input type="hidden" name="thursdayTimes" value="
    <?php if(is_array($_POST["thursdayTimes"])) {
        foreach($_POST["thursdayTimes"] as $time) {
         echo $time."|";}
         }else{
         echo $_POST["thursdayTimes"];}
    ?>">

    <input type="hidden" name="fridayTimes" value="
    <?php if(is_array($_POST["fridayTimes"])) {
        foreach($_POST["fridayTimes"] as $time) {
         echo $time."|";}
         }else{
         echo $_POST["fridayTimes"];}
    ?>">


<?php
function form_submission(){
        /*
        Checks if the form fields are set and not null
        by using the isset() function.

        This allows for proper validation and removes any
        issues that may arise by not checking this before
        trying to send an email, or post the name next to the radio button
        for example
        */

        if(isset($_POST['studentName'])){
            $studentName  = $_POST['studentName'];
        }
        
        if(isset($_POST['studentEmail'])){
           $studentEmail =  $_POST['studentEmail'];
        }

        if(isset($_POST['submit'])){
           $submitButton =  $_POST['submit'];
        }

        /*
        If the submit button has been pressed, then it will check if the name and
        email are not empty. If they are both set/are not null, then it will execute the mail()
        function and print out the email being sucessfully sent.
        */

        if(isset($submitButton)){
            if(!empty($studentName) && (!empty($studentEmail))){
                mail($studentEmail, "Office Hours Appointment Confirmation", "Your appointment has been scheduled.", "From: officehours@lab2.com" . "\r\n");
                echo "Email successfully sent from " . $studentEmail;
            }
        }
    } 
?>

<?php
        
/*
Function used to create entire calendar, which includes
variables, constants, array, and loops needed to properly
and efficiently populate the table.
*/
function create_calendar()
{       
        /*
        Assigns each variable to the array of values for each day of the week(mondayTimes, tuesdayTimes, etc)

        If the variable is not an array, it will create one by breaking the string into separate strings
        which are separated by pipes "|"
        */

        $mondayTimes    = $_POST['mondayTimes'];
        if(!is_array($mondayTimes)) {
            $mondayTimes = explode("|",$mondayTimes);
        }
        $tuesdayTimes   = $_POST['tuesdayTimes'];
        if(!is_array($tuesdayTimes)) {
            $tuesdayTimes = explode("|",$tuesdayTimes);
        }
        $wednesdayTimes = $_POST['wednesdayTimes'];
        if(!is_array($wednesdayTimes)) {
            $wednesdayTimes = explode("|",$wednesdayTimes);
        }
        $thursdayTimes  = $_POST['thursdayTimes'];
        if(!is_array($thursdayTimes)) {
            $thursdayTimes = explode("|",$thursdayTimes);
        }
        $fridayTimes    = $_POST['fridayTimes'];
        if(!is_array($fridayTimes)) {
            $fridayTimes = explode("|",$fridayTimes);
        }
        

    
    /*
    Constant used to define the total number of days in the week (7),
    since the number of days per week will not change.
    */
    define("NUMBER_DAYS_IN_WEEK", 7);
    
    #Array holding the name of each day of the week
    $Days_Of_The_Week = array(
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    );

    //Find out how to append input value to a radio button after submit is pressed php
    //$_POST['studentName'];

    /*
    Obtains the current calendar month in the form of 1-12, 
    "numeric representation of a month, without leading zeros"
    */
    $Calendar_Month = date('n');
    
    #Obtains the current calendar year, two digit representation of a year
    $Calendar_Year = date("Y");
    
    /*
    Variable which holds the total number of days in the current month,
    will change accordingly to whichever month it currently is.
    */
    $Number_Of_Days_In_Month = date('t', mktime(0, 0, 0, $Calendar_Month, 1, $Calendar_Year));
    
    /*
    Variable used to obtain the first day of the month, which is used
    to determine where to start populating on the calendar (how many empty cells to insert)
    */
    $First_Day_Of_Month = date('w', mktime(0, 0, 0, $Calendar_Month, 1, $Calendar_Year));
    
    /*
    Calculates the total number of cells that are necessary to calculate the number
    of weeks needed (rows required) for the loop to iterate
    */
    $Total_Number_Of_Cells = $Number_Of_Days_In_Month + $First_Day_Of_Month;
    
    /*
    Calculate the number of rows needed to be printed for the table
    ceil() function rounds to get 
    */
    $Number_Of_Weeks_In_Month = ceil($Total_Number_Of_Cells / 7);
    
    $Days_Created = 0;
    form_submission();
    echo "<h3 align = center>March 2017</h3>";
    echo "<table>";
    #Loop used to populate the days of the week
    #(Sunday, Monday, Tuesday, etc).
    foreach ($Days_Of_The_Week as $WeekDay) {
        echo "<div id = 'daysOfTheWeek'><td>" . $WeekDay . "</td></div>";
    }
    
    /*
    Continues to create a row while the number of weeks created 
    is less than the max rows needed for the current month.
    */
    for ($i = 0; $i < $Number_Of_Weeks_In_Month; $i++) {
        echo "<tr>";
        
        /*
        Continues to create columns (days) while the number of days created 
        is less than the max number of days in a week
        */
        for ($j = 0; $j < NUMBER_DAYS_IN_WEEK; $j++) {
            /*
            Inserts empty spaces for the columns before the first day of the month,
            so that the calendar looks accurate (works for any month)
            */
            while ($i == 0 && $j < $First_Day_Of_Month) {
                echo "<td>&nbsp;</td>";
                ++$j;
            }
            if ($Days_Created >= $Number_Of_Days_In_Month) {
                echo "<td>&nbsp;</td>";
                break; //Breaks the loop so it doesn't continue through the week
            }
            
                /*
                Depending on the day of the week, it will print the options selected for each day of the week (monday-friday)
                Which is represented by $j, values 1-5 indicating weekdays and 0 and 6 as weekends which we don't fill

                This structure goes through the entire array of monday time slots, tuesday time slots, etc. and checks for the following

                1)If the option is selected..
                2)Then, if the day created is not null and the element in the array is equal..
                3)Then overwrite the radio button and make it text in the form of the raw time slot date value and the name of the student.
                4)Otherwise, just insert a radio button for each element/option selected in the array
                */


                
                if($j==1){
                    $times1 = "<td>" . "<b>" . ++$Days_Created . "</b>";
                    foreach($mondayTimes as $monTimes){
                        if($monTimes){
                            if(isset($_POST[$Days_Created]) && $_POST[$Days_Created] == $monTimes) {
                                $times1 .= "<span id= 'times'> ".$monTimes." -- ".$_POST["studentName"]." </span>";
                            } else {
                                $times1 .= "<br /><input type = 'radio' name = '" . $Days_Created . "' value = '". $monTimes . "'>"  . $monTimes . "</input>";
                            }
                        }
                    }
                    echo "</td>";

                    echo $times1;

                }else if($j==2){
                    $times2 = "<td>" . "<b>" . ++$Days_Created . "</b>";
                    foreach($tuesdayTimes as $tuesTimes) {
                        if($tuesTimes){
                            if(isset($_POST[$Days_Created]) && $_POST[$Days_Created] == $tuesTimes) {
                                $times2 .= "<span id= 'times'> ".$tuesTimes." -- ".$_POST["studentName"]." </span>";
                            } else {
                                $times2 .= "<br /><input type = 'radio' name = '" . $Days_Created . "' value = '". $tuesTimes . "'>"  . $tuesTimes . "</input>";
                            }
                        }
                    }
                    echo "</td>";
                    
                    echo $times2;

                }else if($j==3){
                    $times3 = "<td>" . "<b>" . ++$Days_Created . "</b>";
                    foreach($wednesdayTimes as $wedTimes){
                        if($wedTimes){
                            if(isset($_POST[$Days_Created]) && $_POST[$Days_Created] == $wedTimes) {
                                $times3 .= "<span id= 'times'> ".$wedTimes." -- ".$_POST["studentName"]." </span>";
                            } else {
                                $times3 .= "<br /><input type = 'radio' name = '" . $Days_Created . "' value = '". $wedTimes . "'>"  . $wedTimes . "</input>";
                            }
                        }
                    }
                    echo "</td>";
                    
                    echo $times3;

                }else if($j==4){
                    $times4 = "<td>" . "<b>" . ++$Days_Created . "</b>";
                    foreach($thursdayTimes as $thursTimes){
                        if($thursTimes){
                            if(isset($_POST[$Days_Created]) && $_POST[$Days_Created] == $thursTimes) {
                                $times4 .= "<span id= 'times'> ".$thursTimes." -- ".$_POST["studentName"]." </span>";
                            } else {
                                $times4 .= "<br /><input type = 'radio' name = '" . $Days_Created . "' value = '". $thursTimes . "'>"  . $thursTimes . "</input>";
                            }
                        }
                    }
                    echo "</td>";
                    
                    echo $times4;

                }else if($j==5){
                    $times5 = "<td>" . "<b>" . ++$Days_Created . "</b>";
                    foreach($fridayTimes as $friTimes){
                        if($friTimes){
                            if(isset($_POST[$Days_Created]) && $_POST[$Days_Created] == $friTimes) {
                                $times5 .= "<span id= 'times'> ".$friTimes." -- ".$_POST["studentName"]." </span>";
                            } else {
                                $times5 .= "<br /><input type = 'radio' name = '" . $Days_Created . "' value = '". $friTimes . "'>"  . $friTimes . "</input>";
                            }
                        }
                    }
                    echo "</td>";
                    
                    echo $times5;
                /*
                If the day of the week is Sunday or Saturday (0 or 6), then just print the day number
                */

                }else if($j==0 || $j==6){
                        echo "<td>" . "<b>" . ++$Days_Created . "</b>"  . "</td>";
                }  
                

        }
        echo "</tr>";
    
    }
    echo "</table>";
}
echo create_calendar();
?>
</form>
</div>
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