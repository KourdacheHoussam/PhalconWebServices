<?php

$app = new \Phalcon\Mvc\Micro();
//define a hello route example
$app->get("/", function(){
	echo "Home page";
});
//Returning a JSON
$app->get('/get/some-json', function () {
    echo json_encode(array("some", "important", "data"));
});

/**---------------------------------- 
---------- Functions tooling---------
-------------------------------------**/




/**---------------------------------------------
------- Check Client connection web service ----
------------------------------------------------**/
function CheckUserLogin($userName, $Userpassword){	
	$found=false;
	//{$username} devient $username AND the possible encrypting
	$userName=preg_replace('/[^A-Za-z0-9\-]/', '',  $userName);
	$md5_Userpassword=md5(preg_replace('/[^A-Za-z0-9\-]/', '',  $Userpassword));
	$sha_Userpassword=md5(preg_replace('/[^A-Za-z0-9\-]/', '',  $Userpassword));
	//Encrypt the given password;
	$connection= mysqli_connect("127.0.0.1","root","", "gouiran_cc_bd") or die (mysql_error());
	if(mysqli_connect_error()){
		die('Erreur de connection ('.mysqli_connect_errno() .')'.mysqli_connect_error());
	}
	//db request
	$query="SELECT * FROM admin_user where username='".$userName."' 
		AND password='".$sha_Userpassword."'  OR password='".$md5_Userpassword."'
		OR password='".$Userpassword."'";	
	//Check if there are no errors
	$result = mysqli_query($connection, $query);	
	if(!$result){ //$connection->query
		die('There was an error running query');
	}
	else{		
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			if(isset($row['username']) && isset($row['password'])){
				$found=true;
				//Make a json object
				$user=array('status' => 'ok', 'username'=>$userName, 'firstname' => $row['firstname'],
					'lastname' => $row['lastname'], 'email' => $row['email'],
					'password' => $row['password'], 'created' => $row['created'] );
				print_r(json_encode($user)); //return the data
			}			
		}
	}
	if(!$found){
		$user=array('status' => 'ko', 'username'=>$userName, 'firstname' => $row['firstname'],
			'lastname' => $row['lastname'], 'email' => $row['email'],
			'password' => $row['password'], 'created' => $row['created'] );
		print_r(json_encode($user)); //return the data	
	}	
	//close connection
	$connection->close();
}

// Define the web service
$app->get('/users/connect/{username}/{password}', "CheckUserLogin");

/**------------------
--- Launch the app---
---------------------**/
$app->handle();

?>