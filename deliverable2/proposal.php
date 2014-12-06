<?php

/*if(!isset($_POST['firstName']) || !isset($_POST['surname']) || !isset($_POST['email']) || !isset($_POST['website']) || !isset($_POST['jobTitle']) || !isset($_POST['title']) || !isset($_POST['category']) || !isset($_POST['summary']) || !isset($_POST['partners']) || !isset($_POST['outcome']) || !isset($_POST['timeline']) || !isset($_POST['commitment']) || !isset($_POST['immersion']) || !isset($_POST['funding']) || !isset($_POST['ip']) || !isset($_POST['notes']))
{
    echo("Error");
    return;
}*/

$tableName = "proposals";
$firstName = $_POST['firstName'];
$lastName = $_POST['surname'];
$email = $_POST['email'];
$website = $_POST['website'];
$jobTitle = $_POST['jobTitle'];
$title = $_POST['title'];
$category = $_POST['category'];
$summary = $_POST['summary'];
$partners = $_POST['partners'];
$outcome = $_POST['outcome'];
$timeline = $_POST['timeline'];
$commitment = $_POST['commitment'];
$immersion = $_POST['immersion'];
$disciplines = "";
$funding = $_POST['funding'];
$ip = $_POST['ip'];
$referral = "";
$notes = $_POST['notes'];

$disciplinesArray = ["bioe" => "Bioengineering", "coen" => "Computer Engineering", "civil" => "Civil Engineering", "mech" => "Mechanical Engineering", "elen" => "Electrical Engineering",
 "business" => "Business", "law" => "Law", "publicHealth" => "Public Health", "humanities" => "Humanities", "sciences" => "Sciences", "publicPolicy" => "Public Policy", "otherDiscipline" => "Other"];
foreach($disciplinesArray as $discipline => $proper)
{
	if(isset($_POST[$discipline]))
		$disciplines .= "$proper, ";
}

$referralArray = ["tech" => "Tech Awards / Tech Museum", "gbsi/csts" => "GSBI / CSTS", "fieldPartners" => "Field Partners", "uniPartners" => "University Partners", "corporatePartners" => "Corporate Partners", "search" => "Search Engine", "otherHear" => "Other"];
foreach($referralArray as $referred => $proper)
{
	if(isset($_POST[$referred]))
		$referral .= "$proper, ";
}

$con = mysql_connect("dbserver.engr.scu.edu","nlam","00000965060");

if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("sdb_nlam", $con);

$sql = "INSERT INTO $tableName VALUES ('$firstName', '$lastName','$email','$website', '$jobTitle', '$title', '$category', '$summary', '$partners', '$outcome', '$timeline', '$commitment', '$immersion', '$disciplines', '$funding', '$ip', '$referral', '$notes')";

if (!mysql_query($sql,$con))
{
    die('Error: ' . mysql_error());
}

mysql_close($con)
?>
