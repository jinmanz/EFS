<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/HeaderBody.css">
<link rel="stylesheet" type="text/css" href="../css/NewVenueCSS.css">

</head>

<body>

	<section id="container">
			<section id="header">
				<img id="img" src="../Images/UA-COLOUR-REVERSE.png">
				<p id="TitleNewVenue"> Add new media venue </p>
			</section>
	</section>

	<section id="nav">
				<ul id="navULNewVenue">
					<li id="navulliNewVenue"><a href="AdminPage.php">Administrator Page</a></li>	
					<li id="navulliNewVenue"><a href="MediaVenues.php">Media venues</a></li>	
					<li id="navulliNewVenue"><a href=" ">Log Out</a></li>
				</ul>
	</section>
	<br>

<?php

include'../mysql_connection.php';


echo '<form action="#" method="post" id="Margin"> 
		New media venue: <input type="text" name="NewMediaVenue"><br>
		New contact first name: <input type="text" name="NewContactFirstName"><br>
		New contact last name: <input type="text" name="NewContactLastName"><br>
		New contact email: <input type="text" name="NewContactEmail"><br>
		New contact phone: <input type="text" name="NewContactPhone"><br>

		<input type="submit" value="Add">
		</form>';

if (isset($_POST['NewMediaVenue'])) {

	$NewMediaVenue = $_POST['NewMediaVenue'];
	$NewContactFirstName = $_POST['NewContactFirstName'];
	$NewContactLastName = $_POST['NewContactLastName'];
	$NewContactEmail = $_POST['NewContactEmail'];
	$NewContactPhone = $_POST['NewContactPhone'];

	echo $NewMediaVenue;

	$query = 	"INSERT INTO 
				mediavenue (mvname, contactname, contactsurname, contactemail,contactphone) 
				VALUES ('$NewMediaVenue','$NewContactFirstName','$NewContactLastName','$NewContactEmail','$NewContactPhone')"; 

	$result = mysql_query($query);

	if($result) {
		header('Location: MediaVenues.php');
	}
}

mysql_close();

?>
</body>
</html>