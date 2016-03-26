<?php

include('library.php');

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

echo 	'<tr>
			<td>' . $row['submissionumber'] . 	'</td>' .
			'<td>' . $row['headline'] . 		'</td>' .
			'<td>' . $row['synopsis'] .			'</td>' .
			'<td>' . $row['submissiondate'] . 	'</td>' .
			'<td>' . $row['submissiondate'] . 	'</td>'
		'</tr>';
}
echo '</table>';

mysql_close();
?>