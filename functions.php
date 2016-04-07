<?php

require_once("../../config.php");

function signup($user, $pass){

	//GLOBALS - access outside variable in function

$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"],  "webpr2016_dmikab");

$stmt = $mysql->prepare("INSERT INTO users (usrname, password) VALUES (?,?) ");

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