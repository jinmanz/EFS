<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/HeaderBody.css">
<link rel="stylesheet" type="text/css" href="../css/FullRecordCSS.css">
</head>

<body>
	<section id="container">
			<section id="header">
				<img id="img" src="../Images/UA-COLOUR-REVERSE.png">
				<p id="TitleFullRecord"> Detailed record </p>
			</section>
	</section>

	<section id="nav">
				<ul id="navULFullRecord">
					<li id="navulliFullRecord"><a href="AdminPage.php">Administrator Page</a></li>
				</ul>
	</section>
	<section id="footer">
		<p align="center">  Copyright:      ; Contact us: </p>
	</section>

<?php

include'../mysql_connection.php';

$id = $_GET['edit'];
$query = "SELECT newsid, headline, synopsis, comments, content, submissiondate FROM news where newsid ='$id'";
$result = mysql_query($query);


while ($row = mysql_fetch_array($result)) {

$SubNum 	= $row['newsid'];
$Head 		= $row['headline'];
$Synop 		= $row['synopsis'];
$Comment	= $row['comments'];
$Content    = $row['content'];
$SubDate    = $row['submissiondate'];


echo 	'<div id="table"> <table border ="1"> <tr> 
			<th>Submission number</th>
			<td>'.$SubNum.'</td>
		</tr>
		<tr> 
			<th>Headline</th>
			<td>'.$Head.'</td>
		</tr>
		<tr> 
			<th>Synopsis</th>
			<td>'.$Synop.'</td>
		</tr>
		<tr> 
			<th>Comments</th>
			<td>'.$Comment.'</td>
		</tr>
		<tr> 
			<th>Content</th>
			<td>'.$Content.'</td>
		</tr>
		<tr> 
			<th>Submission date</th>
			<td>'.$SubDate.'</td>
		</tr>';
}
echo '</table> </div>';

mysql_close();

?>

