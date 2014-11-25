<?php
/*Checking whether a user navigated to the php page. If visiting the page, not sending a post request, nothing should be entered into the database.*/
if(!isset($_POST['author']) && !isset($_POST['title']) && !isset($_POST['post']) && !isset($_POST['tag']))
{
    echo("Error");
    return;
}

$tableName = "blog";
$author = "Anonymous";
if(isset($_POST['author']) && !empty($_POST['author']))
    $author = $_POST['author'];
$title = $_POST['title'];
$post = $_POST['post'];
$date = date("m/d/Y");
$tags = "";
if(isset($_POST['tag']) && !empty($_POST['tag']))
{
    $array = $_POST['tag'];

    $pattern = "/#/";
    $tagsArray = explode(" ", $array);
    foreach($tagsArray as $value)
    {
        if(!preg_match($pattern, $value))
            $tags .= "#";
        $tags .= $value . " ";
    }
}

$con = mysql_connect("dbserver.engr.scu.edu","nlam","00000965060");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("sdb_nlam", $con);

$result = mysql_query("SELECT COUNT(*) FROM $tableName");

while($resultArray = mysql_fetch_array($result))
{
    $postNumber = $resultArray['COUNT(*)'];
}
$postNumber++;

$sql = "INSERT INTO $tableName VALUES ('$postNumber', '$author','$title','$post', '$date', '$tags')";

if (!mysql_query($sql,$con))
{
    die('Error: ' . mysql_error());
}

mysql_close($con)
?>