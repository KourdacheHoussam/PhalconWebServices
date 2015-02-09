<?php

$app = new \Phalcon\Mvc\Micro();

//define a hello route example

$app->get("/", function(){
	echo "Home page";
});

$app->get('/say/hello/{name}', function ($name) {
    echo "<h1>Hello! $name</h1>";
});

//defining à handler function avoid as to use anonymous function
function sayHello($name){
	echo "Hello $name";
}
$app-> get('/say/helloboy/{name}', "sayHello");

//Returning a JSON
$app->get('/get/some-json', function () {
    echo json_encode(array("some", "important", "data"));
});


/**---------------------------------------------
------- Check Client connection web service ----
------------------------------------------------**/

function CheckUserLogin($userName,$Userpassword){
	echo "hello $userName, you password is $Userpassword";
}
$app->get('/check/connection/{userName}/{Userpassword}', "CheckUserLogin");


$app->handle();
?>