<?php

$author = "Anonymous";
if(isset($_POST["author"]))
    $author = $_POST["author"];
$title = $_POST['title'];
$post = $_POST['post'];
$date = date("m/d/Y");

$con = mysql_connect("dbserver.engr.scu.edu","nlam","00000965060");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("sdb_nlam", $con);

$tags = "";
if(isset($_POST['tag']))
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

$sql = "INSERT INTO blogEntries VALUES ('$author','$title','$post', '$date', '$tags')";

if (!mysql_query($sql,$con))
{
    die('Error: ' . mysql_error());
}

mysql_close($con)
?>