<!--Created By Nick Richardson-->
<!--IT 207-001, 2/26/2017-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns= “http://www.w3.org/1999/xhtml”>
<head>
<title>Header</title>
<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

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
</body>
</html>