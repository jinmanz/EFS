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
		
		
<?php

include 'library.php';

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$contributortype=$_POST['contributortype'];
$comments=$_POST['comments'];
$headline=$_POST['headline'];
$synopsis=$_POST['synopsis'];
$content=$_POST['contents'];

$checkbox=$_POST['checkbox'];




if($_POST['submit']){
	if(($_POST['firstname']!= null)and($_POST['lastname']!= null)and($_POST['headline']!=null)and($_POST['contents']!=null)and($checkbox=$_POST['checkbox']!=null))
	{mysql_query("INSERT INTO contributor(firstname,surname,email,phone,contributortype) 
					VALUES ('$firstname','$lastname','$email', '$phone','$contributortype')",$pipeline);
	
	 mysql_query("INSERT INTO news (headline,synopsis,content,comments,contributorid,administratorid,copyrightinfo,newssource,contactfirstname,contactsurname,contactemail,contactphone,newswebsite,submissionfile,status,submissiondate,submissionumber) values ('$headline','$synopsis','$content','comments',(select contributorid from contributor where email='$email'), '1','$checkbox','cbcnews','Aaron','Wherry','aaronw@cbc.ca','7803902990','www.cbc.ca','/home/Projects/efs/newsfiles/news1.mp4','pendent', (select now()),'submission news1')",$pipeline);
	
	 		echo"Your submission has been received."."</br>";
			echo"Thank you for supporting the activities of the English & Film Studies Department and its members!"."</br>";
			echo"Please click on one of the links above.\n";
  	}
	
	else echo "Username, headline and content can not be empty."." Or check the copyrightinfo please."."\n";
	
}
else echo "no post happen"."\n";
?>
			
		
		</section>
		
	
	   
		
		<section id=footer>
		<p align="center">  Copyright:      ; Contact us: </p>
		
		</section>
		

		
	
		
	</body>
  </html>	

