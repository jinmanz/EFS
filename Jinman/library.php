<?php

//central library of functions of my website!
/*********************

Database connection for everyone!

*********************/

//1.build a pipeline to the database
$pipeline = mysql_connect('localhost','jinman','clamour-sniffs>irritating8');

//let's test it:
if($pipeline == false){
	echo"Sorry. No database connection!\n";
	exit;
}

//2.select the database to use
$success = mysql_select_db('jinmandb');
if(!$success){
	echo "Sorry! Could not select database!\n";
	exit;
}

function cleanup_string($string){ //给输入的string加单引号
	
	if(empty($string)){
		return 'NULL';
	} else{
		$string = "'" . mysql_real_escape_string($string). "'";
	}
	$string = "'". addslashes($string). "'";
	return $string;
}

function cleanup_number($number){

}


function div_wrap($string){
	$answer = "<div>\n\t$string\n<div>\n"; //t=tab
	return $answer;
}

function p_wrap($string) {
	//viariable scope
	//$string ans $p_string exist only inside here!
	$p_string = '<p>' . $string . '</p>';
	return $p_string;
	}
	
function tohtmlcode($content)  
    {  
        return $content = str_replace("\n","<br>",str_replace(" ", "&nbsp;", $content));  
    }
	
function get_unordered_list_of_emails(){

	//build a query and send to db

	$query = "SELECT CONCAT(first,'',last) AS name,email 
		FROM member 
		WHERE email IS NOT NULL
		ORDER BY last, first";
	$cloud= mysql_query($query);

	$html = "<ul>\n";

	//4.pull rows out of the amorphous 
	while($row = mysql_fetch_assoc($cloud)){
		//print_r($row);
		//echo $row['email'].' -- '.$row['name']."\n";//row现在是一个array
		//exit;//加上exit则只echo第一行的email和name
		//Use variable interpolation
		//$string = "<a href=\"mailto:{$row['email']}\">{$row['name']}</a>";
	
		$string = "\t<li><a href=\"mailto:".$row['email']."\">". $row['name']."</a></li>\n";
		$html=$html. $string;

	}
	$html=$html."</ul>\n";
	return $html;

}

?>