<?php
/*Checking whether a user navigated to the php page. If visiting the page, not sending a post request, nothing should be entered into the database.*/
if(!isset($_POST['Name']) && !isset($_POST['CC']) && !isset($_POST['CVV']) && !isset($_POST['Address']) && !isset($_POST['donationAmount']))
{
    echo ("Error."); 
    return;
}

if(empty($_POST['Name']) || empty($_POST['CC']) || empty($_POST['CVV']) || empty($_POST['Address']) || empty($_POST['donationAmount']))
{
	echo '<div id="overall"><h2> You were missing a field in the form. </h2></div>';
	echo '<a href="http://students.engr.scu.edu/~aprabhak/FrugalInnovationProject/deliverable2/donations.html"> Click here to go back to the form page. </a>';
	return;
}

	$tableName = "donations";

	$name = $_POST['Name'];
	$creditCard = $_POST['CC'];
	$cvv = $_POST['CVV'];
	$address = $_POST['Address'];
	$donationAmount = $_POST['donationAmount'];

	//Change so that only last 4 digits of credit card are stored. Storing full thing in plain text is so wrong.
	$ccLength = strlen($creditCard);
	$last4 = substr($creditCard, -4);

	$xLength = $ccLength - 4;
	$firstDigits='';
		for($x=0; $x <= $xLength-1; $x++){
			$firstDigits = $firstDigits . "*";
		}
	$creditCard = $firstDigits . $last4;

	$con = mysql_connect("dbserver.engr.scu.edu","aprabhak","00000859738");
	if (!$con)
	{
	    die('Could not connect: ' . mysql_error());
	}

	echo '<div id="overall"><h2> Thank you very much for your generous donation of $' . $donationAmount . '. Your payment passed validation and will be processed. </h2></div>'; 

	mysql_select_db("sdb_aprabhak", $con);

	$sql = "INSERT INTO $tableName VALUES ('$name', '$creditCard','$cvv','$address', '$donationAmount')";

	if (!mysql_query($sql,$con))
	{
	    die('Error: ' . mysql_error());
	}

	mysql_close($con)

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
	    <title>Frugal Innovation | Donation</title>
	    <link href='http://fonts.googleapis.com/css?family=Lato:100,300|Economica:400,700' rel='stylesheet' type='text/css'>
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	    <style>
	        html, body
	        {
	            font-family:Lato, sans-serif;
	            height:100%;
	            background-image: url("https://ununsplash.imgix.net/photo-1415045384817-2f9cf7f2ed79?q=75&fm=jpg&s=a0d8ebf44a449c7855ca4128e914a7c5");
	        	background-size: 100% 100%;
	        	text-align:center;
	        }


	        #overall
	        {
	            position:relative;
	            top:5%;
	            width:70%;
	            height:20%;
	            padding:5% 0%;
	            margin:0 auto;
	            text-align:center;
	        }
	       
	    </style>
	</head>
	<body>
		<a href="http://students.engr.scu.edu/~nlam/deliverable2"> Click here to go back to the home page. </a>
	</body>
</html>
