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
				<p id="TitleFullRecord"> Detailed record for item #
					<?php $id = $_GET['edit']; echo $id;?> 
				</p>
			</section>
	</section>

	<section id="nav">
				<ul id="navULFullRecord">
					<li id="navulliFullRecord"><a href="AdminPage.php">Administrator Page</a></li>
				</ul>
	</section>
	<br>

<?php

include'../mysql_connection.php';

$id = $_GET['edit'];

$query = 	"SELECT newsid, headline_title, synopsis, comments, contributorid, content, submissiondate, submissiontype, copyrightagree, eventtime, eventlocation, eventdate FROM submissions WHERE newsid = '$id'";

$result = mysql_query($query);
$row = mysql_fetch_array($result);
	$SubNum 		= $row['newsid'];
	$Head 			= $row['headline_title'];
	$Synop 			= $row['synopsis'];
	$Comment		= $row['comments'];
	$Content   	 	= $row['content'];
	$SubDate   		= $row['submissiondate'];
	$SubType   	 	= $row['submissiontype'];
	$CopyRight 	 	= $row['copyrightagree'];
	$EventTime    	= $row['eventtime'];
	$eventlocation  = $row['eventlocation'];
	$eventdate    	= $row['eventdate'];

	$Contrib 		= $row['contributorid'];

$query2 = 	"SELECT firstname, surname, email, relationEFS
			FROM contributor where contributorid = '$Contrib'";

$result2 = mysql_query($query2);
$row2 = mysql_fetch_array($result2);
	$FirstName 			= $row2['firstname'];
	$Surname 			= $row2['surname'];
	$Email 				= $row2['email'];
	$RelationEFS 		= $row2['relationEFS'];

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
		</tr>
		<tr> 
			<th>Submission Type</th>
			<td>'.$SubType.'</td>
		</tr>
		<tr> 
			<th>Copyright agreement</th>
			<td>'.$CopyRight.'</td>
		</tr>';
		if (!empty($EventTime))	{ 
			echo '<tr> 
			<th>Event time</th>
			<td>'.$EventTime.'</td>
		</tr>';
		}
		if (!empty($eventlocation))	{ 
			echo '<tr> 
			<th>Event time</th>
			<td>'.$eventlocation.'</td>
		</tr>';
		}
		if (!empty($eventdate))	{ 
			echo '<tr> 
			<th>Event date</th>
			<td>'.$eventdate.'</td>
		</tr>';
		}

echo	'<tr> 
			<th>Contributor name</th>
			<td>'.$FirstName.' '.$Surname.'</td>
		</tr>
		<tr> 
			<th>Contributor Email</th>
			<td>'.$Email.'</td>
		</tr>
		<tr> 
			<th>Relationship to EFS</th>
			<td>'.$RelationEFS.'</td>
		</tr>';

echo '</table> </div>';

$query3 = 	"SELECT mvid, mvname, contactname, contactemail
			FROM mediavenue";
$result3 = mysql_query($query3);

echo '<form action="#" method="post" id="sendEmail">';
echo 	'<br> <input type="submit" name="reject" value="Reject"> 
		</form>';

if (isset($_POST['reject'])) {
	$query5 = "DELETE FROM submissions WHERE newsid='$id'";
	$result5 = mysql_query($query5);
		if($result5) {
			echo "Deleted";
			header('Location: AdminPage.php');
		}
}

echo '<p id="sendEmail"> Send this submission to:';
echo '<form action="#" method="post" id="sendEmail">';

while ($row3 = mysql_fetch_array($result3)) {

	$contactname = $row3['contactname'];
	$mvname = $row3['mvname'];
	echo '<input type="checkbox" name ="venue[]" value="'.$mvname.'">'.$contactname.' - '.$mvname.'<br>';

}
echo 	'<br> <input type="submit" value="Submit"> 
		</form> <br>';


if (isset($_POST['venue'])) {
	foreach($_POST['venue'] as $SelectedVenues){

			
			$query4 = "SELECT mvname, contactemail from mediavenue where mvname = '$SelectedVenues'";
			$result4 = mysql_query($query4);
			$row4 = mysql_fetch_array($result4);
			$to = $row4['contactemail'].'<br>';

			Echo '<p id="sendEmail"> The email will be sent to '.$to.' about the item #'.$SubNum.' with headline: '.$Head.'</p>';

			$subject = $SubNum.'<br>';
			$txt = $Head.'<br>'.$Synop.'<br>'.$Comment.'<br>'.$Content.'<br>'.$SubDate.'<br>';
			// mail($to,$subject,$txt);

		}
	
	}
mysql_close();

?>
</body>
</html>