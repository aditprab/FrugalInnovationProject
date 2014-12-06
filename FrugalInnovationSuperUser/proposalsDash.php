<?php
//Performs a query on the donations table and pulls all the columns. 
	$tableName = "donations";
	$con = mysql_connect("dbserver.engr.scu.edu","nlam","00000965060");
	if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }

	mysql_select_db("sdb_nlam", $con);
	
	$result = mysql_query("SELECT * FROM proposals");
	

	while($row = mysql_fetch_array($result))
	{
		echo "<h1> Title: ", $row['title'], "</h1>";
		echo "<p> Name: " , $row['first'], " ", $row['last'], "</p>";
		echo "<p> Email: ", $row['email'], "</p>"; 
		echo "<p> Category: ", $row['category'], "</p>";
		echo "<p> Summary: ", $row['summary'], "</p>";
		echo "<p> Disciplines: ", $row['disciplines'], "</p>";
	        echo "<p> Funding Needed: ", $row['funding'], "</p>";
		echo "<p> Partners: " , $row['partners'], "</p>"; 	
		echo "<p> Timeline: " , $row['timeline'], "</p>";
		echo "<p> Intellectual Property: ", $row['ip'], "</p>";
		echo "<p> Immersion: ", $row['immersion'], "</p>";
		echo "<p> Outcome: ", $row['outcome'], "</p>";
		echo "<p> Referral: ", $row['referral'], "</p>";
		echo "<hr> </hr>";
	}


	mysql_close($con);
?>
<!DOCTYPE HTML>
<html>
	<head>
             <meta charset="utf-8">
            <title>Frugal Innovation | Donation</title>
    	   <link href='http://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
           <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <style>
                html, body
                {
		    font-family: 'Nixie One', cursive;
                    font-weight: bold;
		    height:100%;
                    text-align: left;
		    background-color: #ecf0f1;
		}


                #overall
                {
                    top:5%;
                    width:70%;
                    height:20%;
                    padding:5% 0%;
                    margin:0 auto;
                    text-align: center;    
	   	 }
            </style>
        </head>
       <div id="overall">
	 <body>
            <a href="http://students.engr.scu.edu/~aprabhak/FrugalInnovationSuperUser/dashboardMain.html"> Click here to go back to the dash page! </a>
        </body>
	<div>
</html>
