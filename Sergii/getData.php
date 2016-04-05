<?php

include'../mysql_connection.php';

$query =	"SELECT newsid, headline_title, synopsis, submissiondate, submissiontype 		FROM submissions";

$result = mysql_query($query);

echo '<div id= "table"> <table border="1">';
echo 	'<tr id="tables">
			<th>Submission number</th>
			<th>Headline/title</th>
			<th>Synopsis</th>
			<th>Submission type</th>
			<th>Submission date</th>
			<th>Full record</th> 
		</tr>';

while ($row = mysql_fetch_array($result)) {

$SubNum 	= $row['newsid'];
$SubHead 	= $row['headline_title'];
$SubSynop 	= $row['synopsis'];
$SubDate 	= $row['submissiondate'];
$SubType 	= $row['submissiontype'];

echo 		'<tr>
			<td>'.$SubNum.'</td>
			<td>'.$SubHead.'</td>
			<td>'.$SubSynop.'</td>
			<td>'.$SubType.'</td>
			<td>'.$SubDate.'</td>';
echo		"<td> <a href='FullRecord.php?edit=$row[newsid]' id='view'>View</a></td></tr>";

}

echo '</table> </div>';

mysql_close();
?>