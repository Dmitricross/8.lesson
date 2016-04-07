<?php

require_once("functions.php");
//Restrion - not logged in

if(isset($_SESSION["user_id"])){

//redirect user to restricted page
	header("Location: restrict.php");

}
//login button clicked
if(isset($_POST["login"])) {

//login
echo "loging in...";

if(!empty($_POST["username"]) && !empty($_POST["password"])){



login($_POST["username"], $_POST["password"]);
//save to database

	}else{

		echo "both fields are required";

	}

//signing button clicked
}else if(isset($_POST["signup"])){

	//signup
	echo "signing up ...";


	//the fiekd are not empty
	if(!empty($_POST["username"]) && !empty($_POST["password"])){



signup($_POST["username"], $_POST["password"]);
//save to database

	}else{

		echo "both fields are required";

	}
}

 ?>


<h1>Log in</h1>

<form method ="POST">

    <input type="text" placeholder="username" name="username">
    <input type="password" placeholder="password" name="password">

    <input type="submit" name="login" value="Log in">

    </form>

<h1>Sign up</h1>

<form method ="POST">

    <input type="text" placeholder="username" name="username">
    <input type="password" placeholder="password" name="password">

    <input type="submit" name="signup" value="Sign up">

    </form>
