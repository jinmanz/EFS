<?php


	include'../mysql_connection.php';
	
	if (isset($_POST['venue'])) {
		foreach($_POST['venue'] as $selected){
			$query = "SELECT contactemail from mediavenue";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			mail($row['contactemail']),$SubNum
			echo $selected."<br>";



		}
	
	}
	
	mysql_close();

?>