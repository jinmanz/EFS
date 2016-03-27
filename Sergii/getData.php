<?php

include'../mysql_connection.php';

$query = "SELECT newsid, headline, synopsis, submissiondate FROM news";

$result = mysql_query($query);

echo '<div id= "table"> <table border="1">';
echo 	'<tr id="tables">
			<th>Submission number</th>
			<th>Headline</th>	
			<th>Synopsis</th>
			<th>Submission date</th>
			<th>Submission type</th>
			<th>Full record</th> 
		</tr>';

while ($row = mysql_fetch_array($result)) {

$SubNum 	= $row['newsid'];
$Head 		= $row['headline'];
$Synop 		= $row['synopsis'];
$SubDate 	= $row['submissiondate'];
$SubDate 	= $row['submissiondate'];

echo 		'<tr><td>'.$SubNum.'</td>
			<td>'.$Head.'</td>
			<td>'.$Synop.'</td>
			<td>'.$SubDate.'</td>
			<td>'.$SubDate.'</td>';
echo		"<td> <a href='FullRecord.php?edit=$row[newsid]'>View</a></td></tr>";
			
}

echo '</table> </div>';

mysql_close();
?>