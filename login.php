<?php

require_once("functions.php");


//login button clicked
if(isset($_GET["login"])) {

//login
echo "loging in...";

//signing button clicked
}else if(isset($_GET["signup"])){

	//signup
	echo "signing up ...";


	//the fiekd are not empty
	if(!empty($_GET["username"]) && !empty($_GET["password"])){



signup($_GET["username"], $_GET["password"]);
//save to database

	}else{

		echo "both fields are required";

	}
}

 ?>


<h1>Log in</h1>

<form>

    <input type="text" placeholder="username" name="username">
    <input type="password" placeholder="password" name="username">

    <input type="submit" name="login" value="Log in">

    </form>

<h1>Sign up</h1>

<form>

    <input type="text" placeholder="username" name="username">
    <input type="password" placeholder="password" name="username">

    <input type="submit" name="signup" value="Sign up">

    </form>
