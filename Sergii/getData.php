<?php

include'library1.php';

$query = "SELECT submissionumber, headline, synopsis, submissiondate FROM news";

$result = mysql_query($query);

echo '<table>';
echo 	'<tr>
			<td>submissionnumber</td>
			<td>headline</td>		
			<td>synopsis</td>
			<td>submissiondate</td>
			<td>submissiondate</td>
		</tr>';

while ($row = mysql_fetch_array($result)) {

$SubNum 	= $row['submissionumber'];
$Head 		= $row['headline'];
$Synop 		= $row['synopsis'];
$SubDate 	= $row['submissiondate'];
$SubDate 	= $row['submissiondate'];

echo "<tr><td>".$SubNum."</td><td>".$Head."</td><td>".$Synop."</td><td>".$SubDate."</td><td>".$SubDate."</td></tr>";
}

echo '</table>';

mysql_close();
?>