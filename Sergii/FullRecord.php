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
				<p id="TitleFullRecord"> Detailed record for item with headline:
					<?php $idHead = $_GET['edit']; echo $idHead;?> 
				</p>
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

$idHead = $_GET['edit'];

$query = 	"SELECT newsid, headline, synopsis, comments, content, submissiondate  
			FROM news where headline = '$idHead'";

$query2 = 	"SELECT eventid, tittle, synopsis, comments, submissiondate  
				FROM event where tittle = '$idHead'";

$result = mysql_query($query);
$result2 = mysql_query($query2);


if (mysql_num_rows($result)!==0) {

	$row = mysql_fetch_array($result);
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
			<td id="FullRecTd">'.$Content.'</td>
		</tr>
		<tr> 
			<th>Submission date</th>
			<td>'.$SubDate.'</td>
		</tr>';

}
else {

	$row2 = mysql_fetch_array($result2);
	$SubNum 	= $row2['eventid'];
	$Head 		= $row2['tittle'];
	$Synop 		= $row2['synopsis'];
	$Comment	= $row2['comments'];
	$SubDate    = $row2['submissiondate'];

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
			<th>Submission date</th>
			<td>'.$SubDate.'</td>
		</tr>';
}

echo '</table> </div>';




$query3 = 	"SELECT mvname, contactname
			FROM mediavenue";
$result3 = mysql_query($query3);

echo '<p id="sendEmail"> Send this submission to: <select id="dropdown">';

while ($row3 = mysql_fetch_array($result3)) {

	$contactname = $row3['contactname'];
	$mvname = $row3['mvname'];
	echo '<option>'.$contactname.' - '.$mvname.'</option>';
}
echo '</select>';
echo '<p id="sendEmail"> Add button to reject </p>';
echo '<a href="send.php?"> <img src="https://211texas.hhsc.state.tx.us/211/images/sendButton.png" style="width:100px;height:50px;" id="sendEmail"> </a>';
mysql_close();

?>
</body>
</html>