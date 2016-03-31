<?php

include'../mysql_connection.php';

$query = 	"SELECT newsid, headline, synopsis, submissiondate FROM news
			UNION ALL 
			SELECT eventid, tittle, synopsis, submissiondate FROM event
			ORDER BY submissiondate";

$result = mysql_query($query);

echo '<div id= "table"> <table border="1">';
echo 	'<tr id="tables">
			<th>Submission number</th>
			<th>Headline/title</th>
			<th>Synopsis/title</th>
			<th>Submission type</th>
			<th>Submission date</th>
			<th>Full record</th> 
		</tr>';

while ($row = mysql_fetch_array($result)) {

$SubNum 	= $row['newsid'];
$SubHead 	= $row['headline'];
$SubSynop 	= $row['synopsis'];
$SubDate 	= $row['submissiondate'];

echo 		'<tr>
			<td>'.$SubNum.'</td>
			<td>'.$SubHead.'</td>
			<td>'.$SubSynop.'</td>
			<td> News/Events</td>
			<td>'.$SubDate.'</td>';
echo		"<td> <a href='FullRecord.php?edit=$row[headline]' id='view'>View</a></td></tr>";

}

echo '</table> </div>';

mysql_close();
?>