<?php

///allows Php to connect to the database///
include 'library.php';

$firstname=$_POST['firstname'];	
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$checkbox=$_POST['checkbox'];

///check if the forms has been submited///

if (isset($_POST['submit']){





if($_POST['Save Changes']){
	if(($_POST['firstname']!= null)and($_POST['lastname']!= null)and($_POST['headline']!=null)and($_POST['contents']!=null)and($checkbox=$_POST['checkbox']!=null))
	{mysql_query("INSERT INTO contributor(firstname,surname,email) 
					VALUES ('$firstname','$lastname','$email')",$pipeline);
	
	 mysql_query("INSERT INTO news (headline,synopsis,content,comments,contributorid,administratorid,copyrightinfo,newssource,contactfirstname,contactsurname,contactemail,contactphone,newswebsite,submissionfile,status,submissiondate,submissionumber) values ('$headline','$synopsis','$content','comments',(select contributorid from contributor where email='$email'), '1','$checkbox','cbcnews','Aaron','Wherry','aaronw@cbc.ca','7803902990','www.cbc.ca','/home/Projects/efs/newsfiles/news1.mp4','pendent', (select now()),'submission news1')",$pipeline);
	
	 		echo"Succes!"."</br>";
			echo"You have successfully update your administrator Profile information."."</br>";
  	}
	
	else echo "Username, headline and content can not be empty."." Or check the copyrightinfo please."."\n";
	
}
else echo "no post happen"."\n";
?>

/////////////////////////////////////////////////////////

















////////////////////////////////

<?php

include 'library.php';

session_start();

$firstname=$_POST['firstname'];	
$lastname=$_POST['lastname'];
$email=$_POST['email'];


echo $query = "UPDATE members 
SET firstname = '$firstname', lastname = '$lastname', email = '$email' WHERE  administrator = '$administrator'";

$res = mysql_query($query);

if ($res)

echo "You have successfully update your administrator Profile information."."</br>";

else  echo "Username, headline and content can not be empty."." Or check the copyrightinfo please."."\n";
?>

