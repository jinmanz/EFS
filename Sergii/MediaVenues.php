<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/HeaderBody.css">
<link rel="stylesheet" type="text/css" href="../css/MediaVenuesCSS.css">
</head>

<body>
	<section id="container">
			<section id="header">
				<img id="img" src="../Images/UA-COLOUR-REVERSE.png">
				<p id="TitleMediaVenues"> Media Venues </p>
			</section>
	</section>

	<section id="nav">
				<ul id="navULMediaVenues">
					<li id="navulliMediaVenues"><a href="AdminPage.php">Administrator Page</a></li>	
					<li id="navulliMediaVenues"><a href=" ">Log Out</a></li>
				
				</ul>
	</section>
<br>

<?php

include'../mysql_connection.php';

$query =	"SELECT mvname, contactname, contactsurname, contactemail, contactphone 		FROM mediavenue";

$result = mysql_query($query);

echo '<div id= "table"> <table border="1">';
echo 	'<tr id="tables">
			<th>Media venue</th>
			<th>Contact name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>';

while ($row = mysql_fetch_array($result)) {

$VenueName 			= $row['mvname'];
$ContactName 		= $row['contactname'];
$ContactSurname 	= $row['contactsurname'];
$ContactEmail 		= $row['contactemail'];
$ContactPhone 		= $row['contactphone'];


echo 		'<tr>
			<td>'.$VenueName.'</td>
			<td>'.$ContactName.' '.$ContactSurname.'</td>
			<td>'.$ContactEmail.'</td>
			<td>'.$ContactPhone.'</td>';
echo		"<td> <a href='EditVenue.php?edit=$row[mvname]' id='view'>Edit</a></td>";
echo		"<td> <a href='DeleteVenue.php?edit=$row[mvname]' id='view'>Delete</a></td></tr>";
}

echo '</table> </div>';

echo '<form action="AddNewVenue.php" method="post" id="Margin">';
echo 	'<br> <input type="submit" name="Add New" value="Add new venue"> 
		</form>';



mysql_close();
?>