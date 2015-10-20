<?php

include("header.php");

echo '<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Register form</h3>
  </div>
  <div class="panel-body">
<form id="RegisterForm" action="'.$_SERVER['PHP_SELF'].'" method="post" class="form-horizontal">          								
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail2" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail2" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button name="Submit" type="submit" class="btn btn-default" value="register">Register</button>
    </div>
  </div>
</form></div>
</div>';

if(isset($_REQUEST['Submit']))
{
		
		//array to hold errors
		$errors = array();
		//Minimum 3 letters for username
		if (strlen($_REQUEST['username']) > 2) {
			//the username is uinque so check if no body toke the name
			$query ="SELECT * FROM ACCOUNTUSER WHERE username='".$username."'";
			$stmt = oci_parse($connect, $query);
			if(!$stmt) {
				echo "An error occurred in parsing the sql string.\n";
				exit;
			}
			oci_execute($stmt);
			//return zero if avaliable 
			$nrows = oci_fetch_all($stmt, $res);
			if ($nrows == 0) {
				$username = $_REQUEST['username'];
			} else {
				$errors[] = "<span>The username".$username."Unavaiable</span>";
			}
			
		} else {
			$errors[] = "Username must be greater than 2 letters";
		}
	
	// Check password when user enters password Minimum 7 letters.
	if (strlen($_REQUEST['password']) > 3 && strlen($_REQUEST['password']) < 16) {
		$password = $_REQUEST['password'];
	} else {
		$errors[] = "password must be between 4 and 16";
	}
	
	//check email 
	if (preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $_REQUEST['email'])) {
			$email = $_REQUEST['email'];			
	} else {
			$errors[]= "Invalid email e.g:yazeed@deakin.edu.au";
	}
	
	
	//if there is no error register new customer
	if (empty($errors)) { 
		$query = "INSERT INTO ACCOUNTUSER VALUES(seq_customer.NEXTVAL,'".$username."','".$password."','".$email."')";
		$stmt = oci_parse($connect, $query);
		if(!$stmt) {
			echo "An error occurred in parsing the sql string.\n";
			exit;
		}
		oci_execute($stmt);
		if (oci_num_rows($stmt) == 1) {
			echo '<div class="panel panel-info" style="text-align: left;">
  <div class="panel-heading">
    <h3 class="panel-title">Messsage:</h3>
  </div>
  <div class="panel-body">
    You have successfully registered!
  </div>
</div>';
			
		} 
		OCILogOff ($connect);

	}else{
	echo '<div class="panel panel-danger" style="text-align: left;">
  <div class="panel-heading">
    <h3 class="panel-title">The following occurred:
  </div>
  <div class="panel-body"><ul>'; 
 	// Print each error. 
	foreach ($errors as $m) {
	 echo '
     
    <li>'. $m . '</li>';
	 }
     
     echo '</div>
</div>';
  }
	
}

include("footer.php");
?>
