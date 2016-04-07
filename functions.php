<?php

require_once("../../config.php");

//start server session to store data
//in every file you want to access session
//you should require functions
session_start();

function login($user, $pass){

$pass = hash ("sha512", $pass);
$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"],  "webpr2016_dmikab");

$stmt= $mysql->prepare("SELECT id FROM users WHERE username=? and password=?");

echo $mysql->error;
$stmt->bind_param("ss", $user, $pass);

$stmt->bind_result($id);

$stmt->execute();
//get data

if($stmt->fetch()){

	echo "user with id ".$id." logged in!";

	//create session variables
	//redirect user
	$_SESSION["user_id"] = $id;
	$_SESSION["username"] =$user;

	header("Location: restrict.php");

}else{
    
    //username was wrong or password was wrong or both
	echo "wrong credentials";

}

}
function signup($user, $pass){

	//GLOBALS - access outside variable in function
	$pass = hash ("sha512", $pass);

$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"],  "webpr2016_dmikab");

$stmt = $mysql->prepare("INSERT INTO users (username, password) VALUES (?,?) ");

echo $mysql->error;
$stmt->bind_param("ss", $user, $pass);

if($stmt->execute()){
echo "user saved successfully!";


}else{

	echo $stmt->error;
}



}




/*$name = "Dmitri";

hello($name, "thursday", 7);
hello("DMitri", "esmaspaev", 1);

function hello ($recieved_name, $day_of_the_week, $day){

echo " hello ".$recieved_name."!";
echo "<br>";
echo "Today is ".$day_of_the_week."..".$day;
echo "<br>";

}

*/

?>