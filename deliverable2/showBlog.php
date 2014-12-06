<?php
$con = mysql_connect("dbserver.engr.scu.edu","nlam","00000965060");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("sdb_nlam", $con);

$result = mysql_query("SELECT * FROM blog ORDER BY postNumber DESC LIMIT 10");

while($blog = mysql_fetch_array($result))
{
	echo "<h3>".$blog['title']."</h3>";
	echo "<h5 class=\"date\">".$blog['date']."</h5>";
	echo "<p>".$blog['post']."</p>";
	echo "&mdash;<i>".$blog['name']."</i>";
	if(!empty($blog['tags']))
		echo "<h5>Tags: ".$blog['tags']."</h5>";
}

mysql_close($con);
?>
