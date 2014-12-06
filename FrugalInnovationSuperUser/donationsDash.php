<?php
//Performs a query on the donations table and pulls all the columns. 
	$tableName = "donations";
	$con = mysql_connect("dbserver.engr.scu.edu","aprabhak","00000859738");
	if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }

	mysql_select_db("sdb_aprabhak", $con);
	
	$result = mysql_query("SELECT * FROM donations");
	
	echo "<table cellspacing=2px  border='1'>
	<tr>
		<th> Name </th>
		<th> Credit Card </th>
		<th> CVV </th>
		<th> Address </th>
		<th> Donation Amount </th>
	</tr>";

	while($row = mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>", $row['Name']," </td>";
		echo "<td>",$row['CC'],"</td>";
		echo "<td>", $row['CVV'],"</td>";
		echo "<td>", $row['Address'], "</td>";
		echo "<td>", $row['DonationAmount'], "</td>";	
		echo "</tr>";
	}

	echo "</table>";
	mysql_close($con);
?>
<!DOCTYPE HTML>
<html>
	<head>
             <meta charset="utf-8">
            <title>Frugal Innovation | Donation</title>
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <style>
                html, body
                {
		    font-family: 'Lato', sans-serif;;
                    height:100%;
		background-image: url("https://ununsplash.imgix.net/uploads/1412238370909393b4a19/79f023f1?q=75&fm=jpg&s=0d39e32b84bfacd752f109035a811830");
		background-size: 100%100%;
                }


                #overall
                {
                    top:5%;
                    width:70%;
                    height:20%;
                    padding:5% 0%;
                    margin:0 auto;
                    text-align:center;
                 		    
	    }

            </style>
        </head>
       <div id="overall">
	 <body>
            <a href="http://students.engr.scu.edu/~aprabhak/FrugalInnovationSuperUser/dashboardMain.html"> Click here to go back to the dash page! </a>
        </body>
	<div>
</html>
