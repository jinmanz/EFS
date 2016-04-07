<?php

include'../mysql_connection.php';

$mvname = $_GET['edit'];

$query = "DELETE FROM mediavenue WHERE mvname = '$mvname'";
$result = mysql_query($query);
if ($result) {
	header('Location: MediaVenues.php');
}

mysql_close();

?>
</body>
</html>