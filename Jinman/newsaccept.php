<!DOCTYPE html> 
  <html lang=en>
  
  	<head>
     <meta charset=utf-8> <title>EFS News & Events Collector</title>
	  <link rel=stylesheet title="" href="../css/HeaderBody.css" type="text/css">
	 <link rel=stylesheet title="" href="../css/content.css" type="text/css">
	 
	
  	</head>
  	
  	<body>
		<div id="header">
				<a href="http://www.ualberta.ca/">
					<img id="img" src="../Images/UA-COLOUR-REVERSE.png">
				</a>
				<p id="HomePageTitle"><a href="http://www.ualberta.ca/"> Department of English and Film Studies</a> <br>
				EFS News Collector </p>
			</div>
		

			<div id="nav">
				<ul id="navUL">
					<li id="navulli"><a href="index.html">Home</a></li>
					<li id="navulli"><a href="newssubmission.html">Submit News</a></li>	
					<li id="navulli"><a href="eventssubmission.html">Submit Events</a></li>
					<li id="navulli"><a href=" ">Admin</a></li>
				</ul>
			</div>	
		
		
		<section id=content>
			
				
				<p>Your submission has been received.</p>

<p>Thank you for supporting the activities of the English & Film Studies Department and its members!!</p>

<p>Please click on one of the links above.</p>
			
		
		</section>
		
	
	   
		
		<section id=footer>
		<p align="center">  Copyright:      ; Contact us: </p>
		
		</section>
		
	
		
	
		
	</body>
  </html>	

<?php

include 'library.php';

$username=$_POST['username'];
$comment=$_POST['comment'];

if($_POST['submit']){
	if(($_POST['username']!= null)and($_POST['comment']!=null))
	{$sql = "INSERT INTO commenting (uid,username, comment) VALUES ('', '$username', '$comment')";
	$cloud=mysql_query($sql,$pipeline);
	$row = mysql_fetch_assoc($cloud);//从结果集中取得一行作为关联数组
	print_r($row);
	}
	else{
	echo "Username and Comment can not be empty."."\n";}
	//echo "success!";
}
?>
