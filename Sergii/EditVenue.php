<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/HeaderBody.css">
<link rel="stylesheet" type="text/css" href="../css/EditVenueCSS.css">

</head>

<body>

	<section id="container">
			<section id="header">
				<img id="img" src="../Images/UA-COLOUR-REVERSE.png">
				<p id="TitleEditVenue"> Edit venue:
					<?php $mvname = $_GET['edit']; echo $mvname;?> 
				</p>
			</section>
	</section>

	<section id="nav">
				<ul id="navULEditVenue">
					<li id="navulliEditVenue"><a href="AdminPage.php">Administrator Page</a></li>	
					<li id="navulliEditVenue"><a href="MediaVenues.php">Media venues</a></li>	
					<li id="navulliEditVenue"><a href=" ">Log Out</a></li>
				</ul>
	</section>
	<br>

<?php

include'../mysql_connection.php';

$mvname = $_GET['edit'];

$query = "SELECT mvid FROM mediavenue WHERE mvname = '$mvname'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$mvid = $row['mvid'];


echo '<p id="sendEmail"> Change contact information for venue: '.$mvname.'</p>';

echo '<form action="#" method="post" id="sendEmail"> 
		New media venue name: <input type="text" name="NewMediaVenueName"><br>
		New contact first name: <input type="text" name="NewContactFirstName"><br>
		New contact last name: <input type="text" name="NewContactLastName"><br>
		New contact email: <input type="text" name="NewContactEmail"><br>
		New contact phone: <input type="text" name="NewContactPhone"><br>

		<input type="submit" value="Change">
		</form>';

if (isset($_POST['NewContactFirstName'])) {

	$NewMediaVenueName = $_POST['NewMediaVenueName'];
	$NewContactFirstName = $_POST['NewContactFirstName'];
	$NewContactLastName = $_POST['NewContactLastName'];
	$NewContactEmail = $_POST['NewContactEmail'];
	$NewContactPhone = $_POST['NewContactPhone'];

	$query2 = "UPDATE mediavenue 
				SET mvname 			=	'$NewMediaVenueName',
					contactname 	= 	'$NewContactFirstName',
					contactsurname 	= 	'$NewContactLastName',
					contactemail 	=	'$NewContactEmail',
					contactphone 	=	'$NewContactPhone' 
				WHERE mvid ='$mvid'";

	$result2 = mysql_query($query2);

	if($result2) {
		header('Location: MediaVenues.php');
	}
}

mysql_close();

?>
</body>
</html>