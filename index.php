<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--Created By Nick Richardson-->
<!--IT 207-001, 2/12/2017-->
<html xmlns= “http://www.w3.org/1999/xhtml”>
<head>
<title>Practice Lab Home Page</title>
<link rel="stylesheet" type="text/css" href="index.css">
<body>
<div id = "entireBox">

	<div id = "leftColumn">
		<?php
        readfile("menu.inc");
        ?>
	</div>

	<div id = "topLeft">
		<p align = "center"><strong>IT 207 (Spring 2017)</strong>
	        <br>
	        	Professor Camacho
	        <br>
	        	George Mason University
        </p>
	</div>

	<div id = "topRight">
		<p align = center><strong>Nicholas Richardson</strong>
	    	<br>
	    		<a href="mailto:nrichar6@gmu.edu">GMU email address</a>
	    	<br>
	            <b>Last Modified:</b>
                <i>
                <?php
                echo date("H:i M d, Y e", getlastmod());
                ?>
                </i>
     	</p>
	</div>

	<div id = "leftMiddle">
		<p align = center><strong>Nicholas Richardson</strong>
	    	<br>
	    		
	    	<img id = "border" src = "Nick-Richardson.jpg" alt = "Self Image">
	    	<br>
	    	<?php
            $myName = "Nick";
            echo 'My name ' . "'". $myName . "'" . " has " . strlen($myName) . ' characters in it!';
	    	
	    	?>
    	</p>
	</div>

	<div id = "right">
		<p align = right><strong>Professional & Personal Details</strong>
        	<br>
        	<br>
        		A third year student at GMU, I came to the school in <b>Fall 2014</b>. <b>Born in America and mixed race (Ethiopian/White)</b>, I live in Burke, Virginia, and went to high school here as well at <b>Lake Braddock Secondary School</b>.One of my hobbies was playing with computers, and that is why I decided to major in IT at GMU. My concentration is in Web Development for the moment, and I intend on using the skills I learn at school to make my own business or website one day, as an educational platform for children. I also intend on making a mobile app for a brain game, like matching games, for children as well. I love helping my community, fellow classmates, and others. I live with Crohn's Disease, something I have been dealing with since I was 12, but it doesn't stop me- rather, it makes me want to help others with this ailment as well.
        		<br>
                <br>

                <?php
                echo 'PS: My favorite number is: '.  rand() . ' !';
                ?>
                <br>
                <br>

                <?php
                $numBrothers = 1.34;
                echo 'I have ' . floor($numBrothers) . ' brother named Justin, who also graduated from GMU in 2016!';
                ?>

				
    	</p>
	</div>
				
	<div id = "bottomLeft">
		 <p align = left><strong>Summary</strong>

    	<br>
    		<ul>
        		<b><li>Personal</b>
        	<ul>
            	<li>Loves computer games</li>
            	<li>Has Crohn's Disease</li>
            	<li>Enjoys doing impressions</li>

        		</li>
        	</ul>
        <br>
        		<b><li>Academic</b>
        	<ul>
            	<li>Has a 3.5+ GPA in IT</li>
            	<li>Passed IT 206, 213, 223, 304 with A's in Fall 2016</li>
            	<li>Enjoys helping others</li>

        		</li>
        	</ul>
        <br>
        	<?php
            $age = 21.22;
            echo 'I turned ' . round($age) . ' on 2/1/2017' . ' !'
            ?>
    		</ul>
    	</p>
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