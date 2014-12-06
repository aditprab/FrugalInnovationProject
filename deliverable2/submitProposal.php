<?php

if(!isset($_POST['projectName']) || !isset($_POST['projectDescription']) || !isset($_POST['members']))
{
        echo("Error");
        return;
}

$tableName = "proposals";
$projectName = $_POST['projectName'];
$projectDescription = $_POST['projectDescription'];
$teamMembers = $_POST['members'];

$con = mysql_connect("dbserver.engr.scu.edu","nlam","00000965060");
if (!$con)
{
        die('Could not connect: ' . mysql_error());
}

mysql_select_db("sdb_nlam", $con);

$result = mysql_query("SELECT COUNT(*) FROM $tableName");

while($resultArray = mysql_fetch_array($result))
{
        $proposalNumber = $resultArray['COUNT(*)'];
}
$proposalNumber++;

$sql = "INSERT INTO $tableName VALUES ('$proposalNumber', '$projectName','$projectDescription','$teamMembers')";

if (!mysql_query($sql,$con))
{
        die('Error: ' . mysql_error());
}

mysql_close($con)
?>

